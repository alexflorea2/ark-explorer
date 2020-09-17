import BigNumberJS from "bignumber.js";

export default class BigNumber extends BigNumberJS {
    // const ZERO = BigNumber.make(0);
    // const ONE = BigNumber.make(1);
    // const SATOSHI = BigNumber.make(1e8);

    make(value, base) {
        return new BigNumber(value, base);
    }

}

BigNumberJS.config({ DECIMAL_PLACES: 8, EXPONENTIAL_AT: 1e9 });
