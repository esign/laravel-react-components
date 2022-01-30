import { createElement } from "react";
import ReactDOM from "react-dom";

export const registerReactComponents = (components) => {
    for (const [selector, component] of Object.entries(components)) {
        [...document.querySelectorAll(`[data-react-component="${selector}"]`)].forEach((container) => {
            const props = Object.assign({}, JSON.parse(container.dataset.props));
            delete container.dataset.props;
            ReactDOM.render(createElement(component, props), container);
        });
    }
};
