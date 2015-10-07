/* left nav use sa ticket*/
$(function () {
  	$('.navbar-toggle-sidebar').click(function () {
  		$('.navbar-nav').toggleClass('slide-in');
  		$('.side-body').toggleClass('body-slide-in');
  		$('#search').removeClass('in').addClass('collapse').slideUp(200);
  	});

  	$('#search-trigger').click(function () {
  		$('.navbar-nav').removeClass('slide-in');
  		$('.side-body').removeClass('body-slide-in');
  		$('.search-input').focus();
  	});
  });

  
  // Popup window code
function newWindow(url) {
	popupWindow = window.open(
		url,
		'popUpWindow','height=300,width=850,left=150,top=120,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
}

function closeWindow()
{
   if(false == popupWindow.closed)
   {
      popupWindow.close ();
   }
   else
   {
      alert('That window is already closed. Open the window first and try again!');
   }
}