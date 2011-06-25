jQuery(document).ready( function() {
    var msgdiv = jQuery('div.messages');
    //    msgdiv.delay(1500).slideUp();
});

function printDateDiv(year, month, day) {
    var months = [ "január", "február", "március", "április", "május", "június",
    "július", "Augusztus", "szeptember", "október", "november", "december" ];
    var days = [ "vasárnap", "hétfo", "kedd", "szerda", "csütörtök", "péntek", "szombat"];

    var date = new Date();
    if(year) date.setFullYear(year, month - 1, day);
    var m_year = date.getFullYear();
    var m_month = date.getMonth() + 1;
    var m_day = date.getDate();
    document.write('<p class="date month' + m_month + '" title="' + m_year + '. ' + months[month - 1] + ' ' + m_day + '">' + m_day + '</p>');
}
