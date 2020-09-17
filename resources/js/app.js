// require('./bootstrap');

import BigNumber from "./utils/BigNumber";

window.ArkApp = {};

((context) => {

    context.truncate =  (text, length=13) =>
    {
        let value = text;
        const odd = length % 2;
        const truncationLength = Math.floor((length - 1) / 2);
        return value.length > length
            ? `${value.slice(0, truncationLength - odd)}...${value.slice(value.length - truncationLength + 1)}`
            : value;
    },

    context.readableCurrency = (
            value,
            rate = 1,
            currencyName = "ARK",
            normalise = true,
        ) => {

        const locale = navigator.language || "en-GB";

        let bigNumberValue = (new BigNumber).make(value);

        if (normalise) {
            bigNumberValue = bigNumberValue.dividedBy(1e8);
        }

        bigNumberValue = bigNumberValue.times(rate);

        return `${Number(bigNumberValue).toLocaleString(locale, {
            maximumFractionDigits: 8,
        })}  Ѧ`

    }

})(window.ArkApp.helpers = {});

