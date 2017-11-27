$(()=>{

	//trigger navbar fade when user scrolls down
	let last_scroll_top = 0
	$(window).scroll(function(){
		let scroll_top = $(this).scrollTop()
		if(scroll_top > last_scroll_top){
			$(".navbar").addClass('fade-away')
		} else if(scroll_top < last_scroll_top - 10) {
			$(".navbar").removeClass('fade-away')
		}
		last_scroll_top = scroll_top
	})

})