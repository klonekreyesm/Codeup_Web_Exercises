$('document').ready(function() {

          $('h1').click(function() {
    		$(this).css('background-color', 'yellow');
			});

           $('p').dblclick(function() {
    		$(this).css('font-size', '18 px');
			});
          
          $('li').hover(function() {
          	$(this).css('color', 'red')
          	},
			function() {
             $(this).css('color', 'black');
             }
           );   
           
        });
