<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>Website Contact Form</title>
    <style></style>
</head>
<body>
<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable">
    <tr>
        <td align="center" valign="top">
            <table border="0" cellpadding="20" cellspacing="0" width="600" id="emailContainer">
                <tr>
                    <td align="center" valign="top">

                        <h3 style="font-size: 15px">You have a message from {{$name}}</h3>
                        <h3 style="margin-top: 10px; font-size: 13px">Email: {{$email}}.</h3>
                        <h3 style="margin-top: 10px; font-size: 13px">Phone: {{$phone}}.</h3>
                        <h3 style="margin-top: 10px; font-size: 13px">Message:</h3>

                        <h3 style="font-size: 12px">
                            {{$messageBody}}
                        </h3>

                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>