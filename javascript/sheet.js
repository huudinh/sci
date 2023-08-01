function doGet(e) {    
    sendEmails();
    return handleResponse(e);
}

var SHEET_NAME = "Sheet1";

var SCRIPT_PROP = PropertiesService.getScriptProperties();

function handleResponse(e) {
    var lock = LockService.getPublicLock();
    lock.waitLock(30000);

    try {
        var doc = SpreadsheetApp.openById(SCRIPT_PROP.getProperty("key"));
        var sheet = doc.getSheetByName(SHEET_NAME);

        var headers = sheet.getRange(1, 1, 1, sheet.getLastColumn()).getValues()[0];
        var nextRow = sheet.getLastRow() + 1;
        var row = [];

        for (i in headers) {
            row.push(e.parameter[headers[i]]);
        }

        sheet.getRange(nextRow, 1, 1, row.length).setValues([row]);
        
        return ContentService
            .createTextOutput(JSON.stringify({"result": "success", "row": nextRow}))
            .setMimeType(ContentService.MimeType.JSON); 
    } catch (e) {
        return ContentService
            .createTextOutput(JSON.stringify({"result": "error", "error": e}))
            .setMimeType(ContentService.MimeType.JSON);
    } finally {
        lock.releaseLock();
    }
    
}

function setup() {
    var doc = SpreadsheetApp.getActiveSpreadsheet();
    SCRIPT_PROP.setProperty("key", doc.getId());
}

/**
* emailAddress String The addresses of the recipients, separated by commas
* subject      String The subject line
* message      String The body of the email
**/
function sendEmails(e) {
  var email = 'dinh.vnn@gmail.com, dinhth@scigroup.com.vn, tunglt.bkit@gmail.com';
  var subject = 'Bạn nhận được đơn hàng từ trang banvouchervinpearlgiare.com';
  var htmlbody = "<p>Bạn nhận được đơn hàng từ trang banvouchervinpearlgiare.com.<br> Bạn truy cập vào link để kiểm tra <a href='https://docs.google.com/spreadsheets/d/1VjdskUQmpUT08ibaiTNKvc3cn-EGI1gNyHn6M9ody1Y/edit?usp=sharing'>tại đây</a></p>";
  
  MailApp.sendEmail({
    to: String(email),
    subject: subject,
    // replyTo: String(mailData.email), // This is optional and reliant on your form actually collecting a field named `email`
    htmlBody: htmlbody
  });

}