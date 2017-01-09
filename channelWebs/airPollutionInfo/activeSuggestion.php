<?php
include __DIR__ . '/../DetectDevice.php';
if ($rst === false):
    exit('請使用行動裝置進入此頁面');
endif;
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=no">
    <script src="https://scdn.line-apps.com/channel/sdk/js/loader_20150909.js"></script>
    <script>
    window.addEventListener('load', function() {
        document.addEventListener("deviceready", function(e) {
            document.addEventListener('touchstart', function(e) {
                e.stopPropagation();
            }, false);
            var options = {
                pageKey: "APsug",
                entryPage: false,
                titleBar: {
                    left: {
                        imgId: "btn_default",
                        text: (navigator.language === 'zh-tw') ? "回首頁" : "Home",
                        visible: true,
                        enable: true,
                    },
                    center: {
                        text: "空氣盒子指標與活動建議",
                        clickable: false
                    },
                }
            };
            LCS.Interface.updateTitleBar(options);
            LCS.Interface.registerTitleBarCallback(function(evt) {
                switch (evt.target) {
                    case "LBUTTON":
                        history.go(-1);
                        break;
                    case "RBUTTON":
                        // do nothing
                        break;
                    case "BACK":
                        history.go(-1);
                        break;
                    case "TITLE":
                        // do nothing
                        break;
                }
            });
        }, false);
    });
    </script>
    <style>
    html,
    body {
        font-family: "Microsoft JhengHei";
    }
    
    #wrapper {
        background-image: url('../assets/images/backGround1.png');
        background-repeat: no-repeat;
        position: relative;
        background-size: 100% 100%;
        height: 100%;
        padding-top: 0;
        margin: 0;
    }
    
    .suggest--desc>span {
        text-align: center;
    }
    
    .suggest--content {
        border-color: rgba(0, 0, 0, 0.1);
        border-width: 1px;
        border-style: solid;
    }
    
    .active-suggest--header {
        font-weight: 700;
        font-size: 20px;
        line-height: 20px;
    }
    
    .active-suggest--content {
        font-size: 18px;
        line-height: 20px;
    }
    
    .pm25--desc {
        font-size: 25px;
        font-weight: bold;
        display: block;
    }
    
    .pm25--good {
        background-color: #ccf0a8;
    }
    
    .pm25--moderate {
        background-color: #ffe988;
    }
    
    .pm25--uhfors {
        background-color: #ffae00;
    }
    
    .pm25--uh {
        background-color: #ff8686;
    }
    
    .pm25--vuh {
        background-color: #de8bf5;
    }
    
    .pm25--hazardous {
        background-color: #c75032;
    }
    
    .back {
        background-image: url('/tpelinebot/channelWebs/assets/images/back_before.png');
        margin-top: 15px;
        background-repeat: no-repeat;
        background-size: 100% 100%;
        background-color: rgba(0, 0, 0, 0);
        border: none;
        display: inline-block;
        min-width: 298px;
        height: 60px;
    }
    
    .back:active,
    .back:focus {
        background-image: url('/tpelinebot/channelWebs/assets/images/back_after.png');
        position: relative;
        left: 2px;
        top: 4px;
    }
    
    header.tophead {
        font-size: 20px;
        font-weight: bold;
        margin-bottom: 10px;
    }
    </style>
</head>

<body>
    <div id="wrapper">
        <header class="tophead">
            以下數據為PM2.5濃度，區別標準參考<a href="http://taqm.epa.gov.tw/taqm/tw/b0201.aspx">行政院環保署公布之最新AQI標準</a>
        </header>
        <div class="suggest--desc">
            <span class="pm25--desc pm25--good">良好 (<15.4) </span>
            <div class="suggest--content">
                <header class="active-suggest--header">一般民眾活動建議:</header>
                <p class="active-suggest--content">正常戶外活動。</p>
                <header class="active-suggest--header">敏感性族群活動建議:</header>
                <p class="active-suggest--content">正常戶外活動。</p>
            </div>
        </div>
        <div class="suggest--desc">
            <span class="pm25--desc pm25--moderate">普通 (15.5~35.4)</span>
            <div class="suggest--content">
                <header class="active-suggest--header">一般民眾活動建議:</header>
                <p class="active-suggest--content">正常戶外活動。</p>
                <header class="active-suggest--header">敏感性族群活動建議:</header>
                <p class="active-suggest--content">
                    極特殊敏感族群建議注意可能產生的咳嗽或呼吸急促症狀，但仍可正常戶外活動。
                </p>
            </div>
        </div>
        <div class="suggest--desc">
            <span class="pm25--desc pm25--uhfors">對敏感組群不健康 (35.4~54.4)</span>
            <div class="suggest--content">
                <header class="active-suggest--header">一般民眾活動建議:</header>
                <p class="active-suggest--content">
                    1.一般民眾如果有不適，如眼痛，咳嗽或喉嚨痛等，應該考慮減少戶外活動。
                    <br>2.學生仍可進行戶外活動，但建議減少長時間劇烈運動。
                </p>
                <header class="active-suggest--header">敏感性族群活動建議:</header>
                <p class="active-suggest--content">
                    1.有心臟、呼吸道及心血管疾病患者、孩童及老年人，建議減少體力消耗活動及戶外活動，必要外出應配戴口罩。
                    <br>2.具有氣喘的人可能需增加使用吸入劑的頻率。
                </p>
            </div>
        </div>
        <div class="suggest--desc">
            <span class="pm25--desc pm25--uh">對所有族群不健康 (54.5~150.4)</span>
            <div class="suggest--content">
                <header class="active-suggest--header">一般民眾活動建議:</header>
                <p class="active-suggest--content">
                    1.一般民眾如果有不適，如眼痛，咳嗽或喉嚨痛等，應減少體力消耗，特別是減少戶外活動。
                    <br>2.學生應避免長時間劇烈運動，進行其他戶外活動時應增加休息時間。
                </p>
                <header class="active-suggest--header">敏感性族群活動建議:</header>
                <p class="active-suggest--content">
                    1.有心臟、呼吸道及心血管疾病患者、孩童及老年人，建議留在室內並減少體力消耗活動，必要外出應配戴口罩。
                    <br>2.具有氣喘的人可能需增加使用吸入劑的頻率。
                </p>
            </div>
        </div>
        <div class="suggest--desc">
            <span class="pm25--desc pm25--vuh">非常不健康 (150.5~250.4)</span>
            <div class="suggest--content">
                <header class="active-suggest--header">一般民眾活動建議:</header>
                <p class="active-suggest--content">
                    1.一般民眾應減少戶外活動。
                    <br>2.學生應立即停止戶外活動，並將課程調整於室內進行。
                </p>
                <header class="active-suggest--header">敏感性族群活動建議:</header>
                <p class="active-suggest--content">
                    1.有心臟、呼吸道及心血管疾病患者、孩童及老年人應留在室內並減少體力消耗活動，必要外出應配戴口罩。
                    <br>2.具有氣喘的人應增加使用吸入劑的頻率。
                </p>
            </div>
        </div>
        <div class="suggest--desc">
            <span class="pm25--desc pm25--hazardous">危害 (>250.4)</span>
            <div class="suggest--content">
                <header class="active-suggest--header">一般民眾活動建議:</header>
                <p class="active-suggest--content">
                    1.一般民眾應避免戶外活動，室內應緊閉門窗，必要外出應配戴口罩等防護用具。
                    <br>2.學生應立即停止戶外活動，並將課程調整於室內進行。
                </p>
                <header class="active-suggest--header">敏感性族群活動建議:</header>
                <p class="active-suggest--content">
                    1.有心臟、呼吸道及心血管疾病患者、孩童及老年人應留在室內並避免體力消耗活動，必要外出應配戴口罩。
                    <br>2.具有氣喘的人應增加使用吸入劑的頻率。
                </p>
            </div>
        </div>
    </div>
</body>

</html>
