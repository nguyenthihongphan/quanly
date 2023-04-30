history.pushState(null, document.title, location.href);
window.addEventListener('popstate', function (event)
{
    const leavePage = confirm("you want to go ahead ?");
    if (leavePage) {
        history.back(); 
    } else {
        history.pushState(null, document.title, location.href);
    }  
});
