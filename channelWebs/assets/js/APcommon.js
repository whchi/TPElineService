function getGeocode(obj) {
    return Object.keys(obj)[0];
}

function getGeocodeName(obj) {
    return obj[Object.keys(obj)[0]];
}
/**
 * check if obj is empty
 */
function objIsEmpty(obj) {
    for (var key in obj) {
        if (obj.hasOwnProperty(key)) {
            return false;
        }
    }
    return true;
}
/**
 * 取得URL query string
 */
function getURIQueryString(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}

function gotoSetupPage(sel, action) {
    action = (typeof action === 'undefined') ? '' : action;
    location.href = 'setupAirboxSubInfo.php?mid=' + sel.dataset.mid + '&act=' + action + '&ac=' + sel.value + '&ptc=' + sel.dataset.postcode;
}

function pm25Color(pm25) {
    if (pm25 < 15.4) {
        return '#ccf0a8';
    } else if (pm25 >= 15.5 && pm25 < 35.4) {
        return '#ffe988';
    } else if (pm25 >= 35.5 && pm25 < 54.4) {
        return '#ffae00';
    } else if (pm25 >= 54.5 && pm25 < 150.4) {
        return '#ff8686';
    } else if (pm25 >= 150.5 && pm25 < 250.4) {
        return '#de8bf5';
    } else {
        return '#c75032';
    }
}

function pm25Str(pm25) {
    if (pm25 < 15.4) {
        return '良好';
    } else if (pm25 >= 15.5 && pm25 < 35.4) {
        return '普通';
    } else if (pm25 >= 35.5 && pm25 < 54.4) {
        return '對敏感族群不健康';
    } else if (pm25 >= 54.5 && pm25 < 150.4) {
        return '對所有族群不健康';
    } else if (pm25 >= 150.5 && pm25 < 250.4) {
        return '非常不健康';
    } else {
        return '危害';
    }
}
