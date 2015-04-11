$(function(){
	//*TESTER*alert('IT WORKS!');

		$('#modalAddUserbtn').click(function(){
			$('#modalAddUser').modal('show')
			.find('#modalContAddUser')
			.load($(this).attr('value'));
		})
});