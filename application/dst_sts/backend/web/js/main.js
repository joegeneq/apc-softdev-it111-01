$(function(){
	//*TESTER*alert('IT WORKS!');

		$('#modalAddUserbtn').click(function(){
			$('#modalAddUser').modal('show')
			.find('#modalContAddUser')
			.load($(this).attr('value'));
		})

		$('#modalAddEventbtn').click(function(){
			$('#modalAddEvent').modal('show')
			.find('#modalContAddEvent')
			.load($(this).attr('value'));
		})

		$('#modalAddSectionbtn').click(function(){
			$('#modalAddSection').modal('show')
			.find('#modalContAddSection')
			.load($(this).attr('value'));
		})


});