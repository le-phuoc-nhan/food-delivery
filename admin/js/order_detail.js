var popUpWin = 0;

function popUpWindow(URLStr, left, top, width, height) {
    if (popUpWin) {
        if (!popUpWin.closed) popUpWin.close();
    }
    
    popUpWin = open(URLStr, 'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width=' + 1000 + ',height=' + 1000 + ',left=' + left + ', top=' + top + ',screenX=' + left + ',screenY=' + top + '');
}