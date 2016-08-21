
var TA = {

    Cfg: {
        ReturnType: "Array",
        RoundDecimalPlacesTo: 2
    },

    Helpers: {
        roundDecimal: function(value, n) {
            if (typeof (n) !== 'number') {
                n = TA.Cfg.RoundDecimalPlacesTo;
            }
            var d = 1;
            for (var i = 0; i < n; i++) {
                d = d * 10;
            }
            return Math.round(value * d) / d;
        },
        percentDiff: function(a, b) {
            return ((a - b) / b) * 100;
        }
    },

    Sum: function(series, period) {
        var retVal = [];
        var _src = series;
        var _iSum = 0;
        if (typeof (period) !== 'number') {
            period = _src.length;
        }
        for (var i = 0, len = _src.length; i < len; i++) {
            if ((i + period) <= len) {
                for (var j = i, len2 = i + period; j < len2; j++) {
                    _iSum += parseFloat(_src[j]);
                }
                retVal.push(_iSum);
                _iSum = 0;
            } else {
                retVal.push(null);
            }
        }
        return retVal;
    },

    SMAverage: function(series, period) {
        var retVal = [];
        var _src = ([]).concat(series);
        if (typeof (period) !== 'number') {
            period = _src.length;
        }
        var sums = TA.Sum(_src, period);
        for (var i = 0, len = _src.length; i < len; i++) {
            if ((i + period) <= len) {
                retVal.push(sums[i] / period);
            } else {
                retVal.push(null);
            }
        }
        return retVal;
    },

    EMAverage: function(series, period) {
        var retVal = [];
        var _src = ([]).concat(series);
        _src.reverse();
        if (typeof (period) !== 'number') {
            period = _src.length;
        }
        var previousEMA = startingSMA = TA.SMAverage(_src.slice(0, period))[0];
        var currentEMA;
        var smoothing = 2.00 / (period + 1);
        for (var i = 0, len = _src.length; i < len; i++) {
            if (i < period - 1) {
                retVal.push(null);
            } else if (i == period - 1) {
                retVal.push(startingSMA);
            } else {
                currentEMA = ((parseFloat(_src[i]) - previousEMA) * smoothing) + previousEMA;
                retVal.push(currentEMA);
                previousEMA = currentEMA;
            }
        }
        retVal.reverse();
        return retVal;
    },
//    TODO: This version creates the sums variable only once, which would be far more efficient, but it is not working as expected yet.
//    LinearReg: function(series, period) {
//        var retVal = [];
//        var _src = ([]).concat(series);
//        _src.reverse();
//        if (typeof (period) !== 'number') {
//            period = _src.length;
//        }
//        var sumX = period * (period - 1) * 0.5;
//        var divisor = sumX * sumX - period * period * (period - 1) * (2 * period - 1) / 6;
//        var sumXY, slope, intercept, sum;
//        var sums = TA.Sum(_src, period);
//        for (var i = 0, len = _src.length; i < len; i++) {
//            if (i >= period - 1) {
//                sumXY = 0;
//                for (var count = 0; count < period; count++) {
//                    sumXY += count * parseFloat(_src[i - count]);
//                }
//                slope = (period * sumXY - sumX * sums[i]) / divisor;
//                intercept = (sums[i] - slope * sumX) / period;
//                retVal.push(TA.Helpers.roundDecimal(intercept + slope * (period - 1)));
//            } else {
//                retVal.push(null);
//            }
//        }
//        retVal.reverse();
//        return retVal;
//    },
    LinearReg: function(series, period) {
        var retVal = [];
        var _src = ([]).concat(series);
        _src.reverse();
        if (typeof (period) !== 'number') {
            period = _src.length;
        }
        var sumX = period * (period - 1) * 0.5;
        var divisor = sumX * sumX - period * period * (period - 1) * (2 * period - 1) / 6;
        var sumXY, slope, intercept, sum;
        for (var i = 0, len = _src.length; i < len; i++) {
            if (i >= period - 1) {
                sumXY = 0;
                for (var count = 0; count < period; count++) {
                    sumXY += count * parseFloat(_src[i - count]);
                }
                sum = TA.Sum(_src.slice(0, i + 1).reverse(), period)[0];
                slope = (period * sumXY - sumX * sum) / divisor;
                intercept = (sum - slope * sumX) / period;
                retVal.push(intercept + slope * (period - 1));
            } else {
                retVal.push(null);
            }
        }
        retVal.reverse();
        return retVal;
    },

    Roc: function(series, period) {
        var retVal = [];
        var _src = ([]).concat(series);
        _src.reverse();
        if (typeof (period) !== 'number') {
            period = _src.length;
        }
        for (var i = 0, len = _src.length; i < len; i++) {
            if (i < period - 1) {
                retVal.push(null);
            }
            else {
                valueNBack = parseFloat(_src[i - (period - 1)]);
                currentRoc = ((parseFloat(_src[i]) - valueNBack) / valueNBack) * 100;
                retVal.push(currentRoc);
            }
        }
        retVal.reverse();
        return retVal;
    }
};

