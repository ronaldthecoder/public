import "./index.scss";
import { TextControl, Flex, FlexBlock, FlexItem } from "@wordpress/components";

wp.blocks.registerBlockType("ourplugin/sales-xpress-contact-us", {
  title: "Sales Xpress Contact Us Section",
  icon: "dashicons-feedback",
  category: "common",
  attributes: {
    headerText: { type: "string" },
    streetAddress: { type: "string" },
    city: { type: "string" },
    state: { type: "string" },
    zipCode: { type: "string" },
    phone: { type: "string" },
    email: { type: "string" },
  },
  edit: EditComponent,
  save: function (props) {
    return null;
  },
});

function EditComponent(props) {
  const headerTextHandler = (value) => {
    props.setAttributes({ headerText: value });
  };
  const streetAddressHandler = (value) => {
    props.setAttributes({ streetAddress: value });
  };
  const cityHandler = (value) => {
    props.setAttributes({ city: value });
  };
  const stateHandler = (value) => {
    props.setAttributes({ state: value });
  };
  const zipCodeHandler = (value) => {
    props.setAttributes({ zipCode: value });
  };
  const phoneHandler = (value) => {
    props.setAttributes({ phone: value });
  };
  const emailHandler = (value) => {
    props.setAttributes({ email: value });
  };

  return (
    <div className="sales-xpress-contact-block">
      <TextControl
        label="Header Text:"
        value={props.attributes.headerText}
        onChange={headerTextHandler}
      />
      <Flex>
        <FlexItem>
          <TextControl
            label="Street Address:"
            value={props.attributes.streetAddress}
            onChange={streetAddressHandler}
          />
        </FlexItem>
        <FlexItem>
          <TextControl
            label="City:"
            value={props.attributes.city}
            onChange={cityHandler}
          />
        </FlexItem>
        <FlexItem>
          <TextControl
            label="State Initials:"
            type="text"
            maxlength="2"
            value={props.attributes.state}
            onChange={stateHandler}
          />
        </FlexItem>
        <FlexItem>
          <TextControl
            label="Zip Code:"
            value={props.attributes.zipCode}
            onChange={zipCodeHandler}
          />
        </FlexItem>
      </Flex>
      <TextControl
        label="Phone Number:"
        value={props.attributes.phone}
        onChange={phoneHandler}
      />
      <TextControl
        label="Email Address"
        value={props.attributes.email}
        onChange={emailHandler}
      />
    </div>
  );
}
