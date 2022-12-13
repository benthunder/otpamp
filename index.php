<!doctype html>
<html amp4email lang="en" data-css-strict>

<head>
  <meta charset="utf-8">
  <script async src="https://cdn.ampproject.org/v0.js"></script>
  <script async custom-element="amp-form" src="https://cdn.ampproject.org/v0/amp-form-0.1.js"></script>
  <script async custom-element="amp-bind" src="https://cdn.ampproject.org/v0/amp-bind-0.1.js"></script>
  <script async custom-template="amp-mustache" src="https://cdn.ampproject.org/v0/amp-mustache-0.2.js"></script>
  <style amp4email-boilerplate>
    body {
      visibility: hidden
    }
  </style>
  <style amp-custom>
    form h1,
    form p {
      margin: 0;
      padding: 0;
      padding-bottom: 10px;
    }

    form header {
      margin: 0 0 20px 0;
    }

    form header div {
      font-size: 90%;
      color: #999;
    }

    form header h2 {
      margin: 0 0 5px 0;
    }

    form>div {
      clear: both;
      overflow: hidden;
      padding: 5px;
      margin: 0 0 10px 0;
      color: #9e2800;
    }

    form>div>fieldset>div>div {
      margin: 0 0 5px 0;
    }

    form>div>label,
    legend {
      width: 25%;
      float: left;
      padding-right: 10px;
    }

    form>div>div,
    form>div>fieldset>div {
      width: 75%;
      float: right;
    }

    form>div>fieldset label {
      font-size: 90%;
    }

    fieldset {
      border: 0;
      padding: 0;
    }

    input[type=text],
    input[type=email],
    input[type=url],
    input[type=password],
    textarea {
      width: 100%;
      margin: 0 0 24px 0;
      border-top: 1px solid #ccc;
      border-left: 1px solid #ccc;
      border-right: 1px solid #eee;
      border-bottom: 1px solid #eee;
    }

    input[type=text],
    input[type=email],
    input[type=url],
    input[type=password] {
      width: 50%;
    }

    input[type=text]:focus,
    input[type=email]:focus,
    input[type=url]:focus,
    input[type=password]:focus,
    textarea:focus {
      outline: 0;
      border-color: #4697e4;
    }

    @media (max-width: 600px) {
      form>div {
        margin: 0 0 15px 0;
      }

      form>div>label,
      legend {
        width: 100%;
        float: none;
        margin: 0 0 5px 0;
      }

      form>div>div,
      form>div>fieldset>div {
        width: 100%;
        float: none;
      }

      input[type=text],
      input[type=email],
      input[type=url],
      input[type=password],
      textarea,
      select {
        width: 100%;
      }
    }

    @media (min-width: 1200px) {

      form>div>label,
      legend {
        text-align: right;
      }
    }

    .outercontainer {
      max-width: 600px;
      padding: 1em;
      margin: 0 auto;
      background: url('bg.jpg') no-repeat;
      background-size: cover;
      height: 900px;
    }

    .container {
      /*max-width: 500px;*/
      margin: auto;
      font-family: sans-serif;
      padding: 1em;
    }

    .smt-block {
      padding: 20px;
    }

    .smt-block>div {
      padding: 0;
    }

    .smt-column {
      padding: 0px;
      min-height: 20px;
    }

    .smt-element {
      padding: 0;
    }

    .block {
      display: block;
      width: 100%;
    }

    .m1 {
      margin: 1em 0;
    }

    label {
      margin-bottom: 0.5em;
    }

    .form-inline {
      display: flex;
      flex-flow: row wrap;
      align-items: center;
    }

    .form-inline label {
      margin: 5px 10px 5px 0;
    }

    .form-inline input {
      vertical-align: middle;
      margin: 5px 10px 5px 0;
      padding: 10px;
      background-color: #fff;
      border: 1px solid #ddd;
    }

    .form-inline button {
      padding: 10px 20px;
      background-color: dodgerblue;
      border: 1px solid #ddd;
      color: white;
      cursor: pointer;
    }

    .form-inline button:hover {
      background-color: royalblue;
    }

    @media (max-width: 800px) {
      .form-inline input {
        margin: 10px 0;
      }

      .form-inline {
        flex-direction: column;
        align-items: stretch;
      }
    }

    form {
      /*border: 2px dashed black;*/
      font-family: 'Helvetica';
    }

    /* Full-width input fields */
    input[type=text],
    input[type=password] {
      width: 100%;
      padding: 15px 0px 15px 0;
      /* margin: 5px 0 22px 0; */
      display: inline-block;
      border: none;
      background: #f1f1f1;
    }

    input[type=text]:focus,
    input[type=password]:focus {
      background-color: #ddd;
      outline: none;
    }

    /* Overwrite default styles of hr */
    hr {
      border: 1px solid #f1f1f1;
      margin-bottom: 25px;
    }

    /* Set a style for the submit button */
    .registerbtn {
      background-color: rgb(30, 41, 59);
      color: white;
      padding: 16px 20px;
      margin: 8px 0;
      border: none;
      cursor: pointer;
      width: 100%;
      opacity: 0.9;
    }

    .registerbtn:hover {
      opacity: 1;
    }

    /* Add a blue text color to links */
    a {
      color: dodgerblue;
    }

    /* Set a grey background color and center the text of the "sign in" section */
    .signin {
      background-color: #f1f1f1;
      text-align: center;
    }

    @media only screen and (min-width: 480px) {
      .col-sm-6 {
        max-width: 50%;
        width: 50%;
      }

      .col-sm-4 {
        max-width: 33%;
        width: 33%;
      }

      .col-sm-3 {
        max-width: 25%;
        width: 25%;
      }

      .col-sm-8 {
        max-width: 66.67%;
        width: 66.67%;
      }

      .col-sm-9 {
        max-width: 75%;
        width: 75%;
      }
    }

    form.amp-form-submit-success>.step {
      display: none;
    }

    form .qa {
      margin: 0;
      padding: 0;
      font-size: 10pt;
    }

    form .qa>label {
      font-weight: 700;
      margin: 0;
    }

    form .qa>input {
      margin: 0 0 24px 0;
    }

    form .qa>.select {
      margin: 0 0 24px 0;
    }

    form .qa>.new-select {
      position: relative;
      display: flex;
      width: 100%;
      overflow: hidden;
      padding: 0px;
      margin: 0 0 24px 0;
    }

    form .qa input,
    form .qa select,
    form .qa textarea {
      border-radius: 5px;
      padding: 5px 12px;
      border-color: rgb(203, 213, 225);
      outline: none;
    }

    form .qa input:focus,
    form .qa select:focus,
    form .qa textarea:focus {
      border-color: #0A8FFD;
      box-shadow: 0 0 0 4px rgba(10, 143, 253, 0.2);
      background: #fff;
    }

    form .qa input:hover,
    form .qa select:hover,
    form .qa textarea:hover {
      border-color: #0A8FFD;
      background: #FAFCFF;
    }

    form .form-text {
      color: black;
    }

    form .qa .question {
      display: block;
      padding-bottom: 5px;
      font-weight: 700;
    }

    form .qa .answer {
      max-width: 100%;
    }

    form .qa .input-style {
      color: rgb(30, 41, 59);
      background-color: rgb(255, 255, 255);
      font-family: Helvetica;
      font-size: inherit;
      width: 100%;
      border-width: 1px;
      border-style: solid;
      border-radius: 5px;
      border-color: rgb(203, 213, 225);
      outline: none;
      align-self: flex-start;
      box-sizing: border-box;
      margin-bottom: 15px;
    }

    textarea {
      resize: vertical;
    }

    .nps-wrapper {
      display: flex;
      /*-webkit-box-pack: justify;*/
      justify-content: space-between;
      flex-wrap: wrap;
      width: 99%;
    }

    .nps-wrapper label {
      color: rgb(30, 41, 59);
      position: relative;
      margin: 0px;
      width: 7%;
      height: 0px;
      padding-bottom: 7%;
    }

    .nps-wrapper label input {
      width: 100%;
      height: 100%;
      opacity: 0;
      position: absolute;
      margin: 0px;
    }

    .nps-wrapper label span {
      cursor: pointer;
      position: absolute;
      height: 100%;
      width: 100%;
      display: flex;
      /*-webkit-box-pack: center;*/
      justify-content: center;
      /*-webkit-box-align: center;*/
      align-items: center;
      font-size: 18px;
      font-weight: 300;
      border: 2px solid rgb(226, 232, 240);
      background-color: rgba(255, 255, 255, 0.1);
    }

    .nps-wrapper span:hover {
      border: 2px solid rgb(92, 85, 231);
    }

    .nps-wrapper label input:checked~span {
      border: 2px solid rgb(92, 85, 231);
      background-color: rgb(92, 85, 231);
      color: rgb(255, 255, 255);
      cursor: pointer;
    }

    .nps-text {
      /* cursor: text;*/
      font-size: 18px;
      padding-bottom: 0;
      padding-top: 0px;
      font-weight: bold;
      font-family: sans-serif;
    }

    .nps-element-section,
    .nps-element-section.qa {
      width: 100%;
    }

    .nps-option-section {
      width: 100%;
      background: #fff;
      margin-bottom: 20px;
      padding: 15px 0;
    }

    .nps-option-section,
    .emoji-option-section,
    .thumbs-option-section {
      width: 100%;
    }

    .nps-help-text {
      display: none;
      justify-content: space-between;
      padding: 0;
    }

    .nps-help-text-option {
      min-width: 4px;
      padding: 5px 0 0 0;
    }

    .nps-help-text-active {
      display: flex;
    }

    /* Old emoji styles starts (for old templates) */
    .emoji-wrapper {
      display: flex;
      justify-content: space-around;
      margin-bottom: 20px;
    }

    .emoji-wrapper label {
      color: rgb(30, 41, 59);
      position: relative;
      margin: 0px;
      width: 7%;
      height: 0px;
      padding-bottom: 7%;
    }

    .emoji-wrapper label input {
      width: 100%;
      height: 100%;
      opacity: 0;
      position: absolute;
      margin: 0px;
    }

    .emoji-wrapper label span {
      cursor: pointer;
      position: absolute;
      height: 100%;
      width: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
      font-size: 40px;
    }

    /* Old emoji styles ends */

    /* New emoji styles starts */
    .new-emoji .emoji-wrapper {
      display: block;
      margin-bottom: 20px;
    }

    .new-emoji .emoji-wrapper label {
      display: inline-block;
      color: rgb(30, 41, 59);
      position: relative;
      min-width: 40px;
      min-height: 40px;
      margin: 0 5px;
      width: auto;
      height: auto;
      padding: 0;
    }

    .new-emoji .emoji-wrapper label input {
      opacity: 0;
      position: absolute;
      margin: 0px;
      width: 100%;
      height: 100%;
      visibility: hidden;
    }

    .new-emoji .emoji-wrapper label span {
      position: static;
      width: 100%;
      height: 100%;
      display: block;
      cursor: pointer;
      font-size: 40px;
      background-color: rgba(255, 255, 255, 0.1);
    }

    /* New emoji styles ends */

    .emoji-wrapper label input:checked~span {
      font-size: 50px;
      cursor: pointer;
    }

    .nps-element-section,
    .emoji-element-section,
    .thumbs-element-section,
    .select-input,
    .radiogroup,
    .checkboxgroup {
      overflow: hidden;
    }

    /* Old thumbs-wrapper starts (for old templates) */
    .thumbs-wrapper {
      display: flex;
      justify-content: space-evenly;
      margin-bottom: 20px;
    }

    .thumbs-wrapper label {
      color: rgb(30, 41, 59);
      position: relative;
      margin: 0px;
      width: 7%;
      height: 0px;
      padding-bottom: 7%;
    }

    .thumbs-wrapper label input {
      width: 100%;
      height: 100%;
      opacity: 0;
      position: absolute;
      margin: 0px;
    }

    .thumbs-wrapper label span {
      cursor: pointer;
      position: absolute;
      height: 100%;
      width: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
      font-size: 40px;
    }

    /* Old thumbs styles ends */

    /* New thumbs styles starts */
    .new-thumbs .thumbs-wrapper {
      display: block;
      margin-bottom: 20px;
    }

    .new-thumbs .thumbs-wrapper label {
      display: inline-block;
      color: rgb(30, 41, 59);
      position: relative;
      min-width: 40px;
      min-height: 40px;
      margin: 0 20px 0 0;
      width: auto;
      height: auto;
      padding: 0;
    }

    .new-thumbs .thumbs-wrapper label input {
      opacity: 0;
      position: absolute;
      margin: 0px;
      width: 100%;
      height: 100%;
      opacity: 0;
      visibility: hidden;
    }

    .new-thumbs .thumbs-wrapper label span {
      position: static;
      width: 100%;
      height: 100%;
      display: block;
      cursor: pointer;
      font-size: 40px;
      background-color: rgba(255, 255, 255, 0.1);
    }

    /* New thumbs styles ends */

    .thumbs-wrapper label input:checked~span {
      color: red;
      font-size: 50px;
      cursor: pointer;
    }

    .thumbs-up-form-element,
    .emoji-form-element,
    .social-media-form-element {
      padding-top: 15px;
      width: 100%;
    }

    .radiogroup-options,
    .checkboxgroup-options {
      margin-bottom: 20px;
    }


    .new-radio-group .radiogroup-options .select-container,
    .new-checkbox-group .checkboxgroup-options .select-container {
      display: inline-flex;
      align-items: center;
      position: relative;
      padding: 0px;
      margin: 0px;
      cursor: pointer;
      text-decoration: none;
      font-size: inherit;
    }

    .new-radio-group .select-outer-container,
    .new-checkbox-group .select-outer-container {
      padding: 8px 0;
      font-weight: 700;
    }

    .social-media-element {
      display: flex;
      flex-flow: wrap;
      justify-content: center;
    }

    .button {
      outline: none;
      background-color: #fd9301;
      color: rgb(255, 255, 255);
      border-radius: 50px;
      padding: 12px 24px;
      margin: 5px;
      height: auto;
      width: auto;
      letter-spacing: 1px;
      border-width: 0px;
      border-style: solid;
      line-height: 1;
      font-size: 16px;
      font-family: Helvetica;
      align-self: center;
      text-align: center;
      text-decoration: none;
      word-wrap: normal;
      word-break: break-word;
      font-weight: 700;
      margin:0px auto;
      display:block;
    }

    #form_otpSMS .question {
      font-weight: 700;
    }
    #lbl_sn, #joinDate {
      width: 46%;
      float: left;
      margin-right: 20px;
    }

    #lbl_gioitinh, #input_gt {
      width: 46%;
      float: right;
      
    }
    #input_gtNam,
    #input_gtNu,
    #input_gtOther {
      width: 4%;
      margin: 10px 0px 22px 5px;
    }
  </style>
</head>

<body>
  <div class="outercontainer" id="outercontainer"
    style="box-sizing:border-box;max-width:600px;width:100%; height: 900px;" align="center">
    <div class="smt-block">
      <div>
        <div class="smt-column" id="header_banner">
          <a href="https://www.google.com">
            <div class="smt-element"
              style="text-align: -webkit-center; width: 113px; height: 48px; margin-left: 45px; margin-top: -10px;"
              id="DIV69656628"></div>
          </a>
        </div>
      </div>
    </div>
    <div class="smt-block" id="DIV60766120" style="padding-top: 0px; width: 336px; height: 417px; margin-top: 260px;"
      align="left">
      <div id="DIV69668719">
        <div class="form-wrapper" style="padding: 0;">
          <form [hidden]="is_hide_main_form" id='form1' method="post" 
          action-xhr="//118.71.251.188:59004/api/v1/authentication/request-otp-without-encrypt" 
          verify-xhr="//118.71.251.188:59004/api/v1/authentication/request-otp-without-encrypt" 
          on="submit-success:AMP.setState({'cellphone': event.response.phone,is_hide_reset: event.response.is_hide_reset,is_hide_confirm: event.response.is_hide_confirm,is_hide_main_form:event.response.is_hide_main_form})"
          enctype="application/x-www-form-urlencoded" target="_top">
            <div class="step">
              <p class="qa" id="P56165572">
                <label class="question cke_edited" id="lbl_name" for="name" aria-readonly="false">Họ tên *</label>
                <input class="answer input-style" type="text" placeholder="Họ tên" required="" id="fullName"
                  name="fullName">

                <label class="question cke_edited" id="lbl_sn" for="sn" aria-readonly="false">Ngày sinh *</label>
                
                <label class="question cke_edited" id="lbl_gioitinh" for="gt" aria-readonly="false">Giới tính *</label>

                <input class="answer input-style" type="date" placeholder="Ngày sinh" required=""
                  id="joinDate" name="joinDate">

                <input class="answer input-style" type="radio" required=""
                  id="input_gtNam" name="gender" value="Nam" checked>
                <label for="Nam">Nam</label>

                <input class="answer input-style" type="radio" required=""
                  id="input_gtNu" name="gender" value="Nu">
                <label for="Nu">Nữ</label>

                <input class="answer input-style" type="radio" required=""
                  id="input_gtOther" name="gender" value="Khac">
                <label for="Khac">Khác</label>

                <label class="question cke_edited" id="lbl_sdt" for="sdt" aria-readonly="false">Số điện thoại *</label>
                <input class="answer input-style" type="tel" placeholder="Số điện thoại" required="" id="cellphone"
                  name="cellphone" pattern="[0-9]{10}?">

                <label class="question cke_edited" id="lbl_sdt" for="email" aria-readonly="false">Email *</label>
                <input class="answer input-style" type="email" placeholder="Email" required="" id="email"
                  name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
              </p>

                <button type="submit" class="button cke_edited" style="background-color:#fd9301;">
                    LẤY MÃ NGAY
                </button>

            </div>
            
            <div submit-error>
              <template type="amp-mustache">
                <div id="form_otpSMS-successhtml" style="padding: 30px 0px; width: 100%; background-color: transparent; height: auto; background-size: cover; cursor: pointer; border-style: solid; border-width: 0px; margin: 0px;">
                  {{#verifyErrors}}
                    <p style="text-align: center;font-size: 20px; color: rgb(68, 68, 68); font-family: Helvetica;line-height: 1.5; font-weight: 700;" id="P78668551">
                      {{message}}
                    </p>
                  {{/verifyErrors}}
                </div>
              </template>
            </div>
          </form>
          <form hidden [hidden]="is_hide_confirm" id='form2' method="post" action-xhr="//otp-sms-demo:8888/confirm.php" verify-xhr="//otp-sms-demo:8888/confirm.php" on="submit-error:AMP.setState({'cellphone': event.response.phone,is_hide_reset: event.response.is_hide_reset,is_hide_confirm: event.response.is_hide_confirm,is_hide_main_form:event.response.is_hide_main_form})">

            <div class="step">
              <input hidden name="cellphone" id="phone-confirm" [value]="cellphone">
              <p class="qa">
                <label class="question cke_edited" for="otp-confirm-code" aria-readonly="false">Mã OTP*</label>
                <input class="answer input-style" type="text" placeholder="Mã OTP" required="" id="otp-confirm-code" name="otp-confirm-code">
              </p>

              <section class="stepflowbuttons" style="text-align: center;" id="btn-resend"><button type="submit" class="button cke_edited" style="background-color: rgb(255, 0, 0);">Xác nhận<br></button></section>

              <div submit-error>
                <template type="amp-mustache">
                  <div style="padding: 30px 0px; width: 100%; background-color: transparent; height: auto; background-size: cover; cursor: pointer; border-style: solid; border-width: 0px; margin: 0px;">
                    {{#verifyErrors}}
                      <p style="text-align: center;font-size: 20px; color: rgb(68, 68, 68); font-family: Helvetica;line-height: 1.5; font-weight: 700;" id="P78668551">
                        {{message}}
                      </p>
                    {{/verifyErrors}}
                  </div>
                </template>
              </div>
            </div>

            <div submit-success>
              <template type="amp-mustache">
                <div class="success-message" submit-success="" style="padding: 30px 0px; width: 100%; background-color: transparent; height: auto; background-size: cover; cursor: pointer; border-style: solid; border-width: 0px; margin: 0px;">
                  <p style="text-align: center;font-size: 20px; color: rgb(68, 68, 68); font-family: Helvetica;line-height: 1.5; font-weight: 700;">Your response is recorded. Thanks for the feedback...</p>
                </div>
              </template>
            </div>

          </form>

          <form hidden [hidden]="is_hide_reset" id='form3' method="post" action-xhr="//otp-sms-demo:8888/resendotp.php" verify-xhr="//otp-sms-demo:8888/resendotp.php" 
          on="submit-success:AMP.setState({'cellphone': event.response.phone,is_hide_reset: event.response.is_hide_reset,is_hide_confirm: event.response.is_hide_confirm,is_hide_main_form:event.response.is_hide_main_form})">

            <p class="qa">
              <label class="question cke_edited" for="otp-resend-phone" aria-readonly="false">Phone&nbsp;*</label>
              <input class="answer input-style" type="tel" placeholder="Số điện thoại" required="" id="otp-resend-phone" name="cellphone" [value]="cellphone" pattern="[0-9]{10}?">
            </p>

            <section class="stepflowbuttons" style="text-align: center;" id="btn-resend"><button type="submit" class="button cke_edited" style="background-color: rgb(255, 0, 0);">Nhận lại<br></button></section>

            <div hidden [hidden]="is_hide_reset" class="success-message" style="padding: 30px 0px; width: 100%; background-color: transparent; height: auto; background-size: cover; cursor: pointer; border-style: solid; border-width: 0px; margin: 0px;">
              <p style="text-align: center;font-size: 20px; color: rgb(68, 68, 68); font-family: Helvetica;line-height: 1.5; font-weight: 700;" id="P78668551">Mã OTP đã hết hạn</p>
            </div>

          </form>

        </div>
      </div>
    </div>
  </div>

</body>

</html>