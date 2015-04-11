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

		$('#modalAddStudentbtn').click(function(){
			$('#modalAddStudent').modal('show')
			.find('#modalContAddStudent')
			.load($(this).attr('value'));
		})

		$('#modalAddParentbtn').click(function(){
			$('#modalAddParent').modal('show')
			.find('#modalContAddParent')
			.load($(this).attr('value'));
		})

		$('#modalAddAdviserbtn').click(function(){
			$('#modalAddAdviser').modal('show')
			.find('#modalContAddAdviser')
			.load($(this).attr('value'));
		})

});