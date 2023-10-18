import $ from "jquery";

class Search {
  constructor() {
    this.searchInput = $("#search-post");
    this.blogsSpinner = $(".blogs .loading-box");
    this.searchResults = $("#search-results");
    this.events();
    this.typingTimer;
    this.isSpinnerVisible = false;
  }

  //EVENTS
  events() {
    this.searchInput.on("input", this.typingLogic.bind(this));
  }

  //METHODS
  typingLogic(e) {
    clearTimeout(this.typingTimer);
    if (e.currentTarget.value) {
      if (!this.isSpinnerVisible) {
        this.startSpinner();
        this.isSpinnerVisible = true;
      }
      this.typingTimer = setTimeout(
        this.getResults.bind(this, e.currentTarget.value),
        1000
      );
    } else {
      this.searchResults.empty();
      this.endSpinner();
      this.isSpinnerVisible = false;
    }
  }

  async getResults(input) {
    await $.when(
      $.getJSON(
        `${salesXpressData.root_url}/wp-json/salesXpress/v1/search?term=${input}`
      )
    ).then(
      (posts) => {
        //FUNCTION FOR CALCULATING READ TIME BASED ON POST CONTENT
        const getReadTime = (content) => {
          let wordCount = content
            .replace(/(<([^>]+)>)/gi, "")
            .replace("\n", "")
            .split(" ").length;

          return Math.ceil(wordCount / 238);
        };

        //CREATING HTML BLOG CARDS USING API POST DATA
        const html = posts.reduce((accum, cur) => {
          const curLink = cur["link"];
          const curTitle = cur["title"];
          const curContent =
            cur["content"]
              .replace(/(<([^>]+)>)/gi, "")
              .replace("\n", "")
              .substring(0, 80) + " ...";
          const readTime = getReadTime(cur["content"]);
          const curImgUrl = cur["blogCardImgUrl"];
          const curAuthor = cur["author"];

          const blogCard = `
          <div class="blog-card rounded">
            <a href="${curLink}" class="img-box bg-grey--100">
              <img src="${curImgUrl}" alt="blog image" />
            </a>
            <div class="flex-col blog-card-description bg-grey--200">
              <a href="${curLink}">
                <h5 class="underline">${curTitle}</h5>
              </a>
              <a href="${curLink}">
                <p class="underline">${curContent}</p>
              </a>
              <div class="article-details flex-row">
                <p class="read-time bold">${readTime}&nbsp;MIN READ</p>
                <p class="title--1 bold">&middot;</p>
                <p class="author">${curAuthor}</p>
              </div>
            </div>
          </div>`;

          return accum + blogCard;
        }, "");
        //DOM MANIPULATION WITH NEW BLOG CARDS
        this.searchResults.empty();
        this.searchResults.append(html);
      },
      () => {
        this.searchResults.append(
          `<h5 class="bold">Unexpected Error, Please Try again later</h5>`
        );
      }
    );
    this.endSpinner();
    this.isSpinnerVisible = false;
  }

  startSpinner() {
    this.blogsSpinner.removeClass("hide");
  }
  endSpinner() {
    this.blogsSpinner.addClass("hide");
  }
}

export default Search;
