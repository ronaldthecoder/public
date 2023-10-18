import $ from "jquery";

jQuery(() => {
  //RETRIEVE BLOG READ TIME DATA
  const { className, dataAttribute } = blogReadTimeData;

  //SET READ TIME INFORMATION
  $(`.${className}`).each((i, elem) => {
    const postContent = elem.dataset[dataAttribute];
    const wordCount = postContent.split(" ").length;
    const readTime = Math.ceil(wordCount / 250);
    const displayText = `${readTime} MIN READ`;
    $(elem).text(displayText);
  });
});
