$(document).ready(function() 
{ 
    $("form").submit(function() {                     
         // complete the code here
        var readingTime = $("#readingTime").val();
        var readingLevel = $("#readingLevel").val();
        var msg = "Your Reading entered after " + readingTime + " is " + readingLevel + " mmol/L";
        msg += "\nSugar level is: "
        if (readingLevel <= 7.8) {
            msg += "Normal";
        }
        else if ((readingLevel >= 7.9) && readingLevel <= 11.0) {
            msg += "Elevated";
        }
        else {
            msg += "High";
        }
        msg += "\nProceed to submit Readings?"
        if(confirm(msg)) {
            return true;
        }
        return false;
    })
});


