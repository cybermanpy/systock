$(document).on('ready', start);

function start()
{
	$('#user').attr("placeholder", "Usuario");
	$('#pass').attr("placeholder", "Password");
	$('.add').on('click', clone);
	$('#displayblock').on('click','.close', delclone);
	var days=[ "D", "L", "M", "X", "J", "V", "S" ];
	var months=[ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ];
	$('form #fecha').datepicker({dayNamesMin: days , dateFormat: "yy-mm-dd", monthNames: months});
	$('#frminsdir').validate
	({
		rules:{'dir':'required'},
		messages:{'dir':' *Campo Obligatorio'},
		debug: true,
		submitHandler: function(form)
		{
			form.submit();
		}
	});
	$('#frminsdptos').validate
	({
		rules:{'dpto':'required','dir':'required'},
		messages:{'dpto':' *Campo Obligatorio','dir':' *Campo Obligatorio'},
		debug: true,
		submitHandler: function(form)
		{
			form.submit();
		}
	});
	$('#frminsaddetentregas').validate
	({
		rules:{'insumo[]':'required','cant[]':'required'},
		messages:{'insumo[]':' *Campo Obligatorio','cant[]':' *Campo Obligatorio'},
		debug: true,
		submitHandler: function(form)
		{
			form.submit();
		}
	});
	$('#frminsordencompras').validate
	({
		rules:{'norden':'required','fecha':'required'},
		messages:{'norden':' *Campo Obligatorio','fecha':' *Campo Obligatorio'},
		debug: true,
		submitHandler: function(form)
		{
			form.submit();
		}
	});
	$('#frminsdetordencompras').validate
	({
		rules:{'insumo[]':'required','ordenc[]':'required','cantidad[]':'required'},
		messages:{'insumo[]':' *Campo Obligatorio','ordenc[]':' *Campo Obligatorio','cantidad[]':' *Campo Obligatorio'},
		debug: true,
		submitHandler: function(form)
		{
			form.submit();
		}
	});
	$('#frminsdesinsumos').validate
	({
		rules:{'des':'required','tipo':'required','rubro':'required'},
		messages:{'des':' *Campo Obligatorio','tipo':' *Campo Obligatorio','rubro':' *Campo Obligatorio'},
		debug: true,
		submitHandler: function(form)
		{
			form.submit();
		}
	});
	$('#frminsentregas').validate
	({
		rules:{'des':'required','fecha':'required','ncompra':'required','prov':'required'},
		messages:{'des':' *Campo Obligatorio','fecha':' *Campo Obligatorio','ncompra':' *Campo Obligatorio','prov':' *Campo Obligatorio'},
		debug: true,
		submitHandler: function(form)
		{
			form.submit();
		}
	});
	$('#frminsertdet').validate
	({
		rules:{'insumo[]':'required','cant[]':'required'},
		messages:{'insumo[]':' *Campo Obligatorio','cant[]':' *Campo Obligatorio'},
		debug: true,
		submitHandler: function(form)
		{
			form.submit();
		}
	});
	$('#frminsestado').validate
	({
		rules:{'estado':'required'},
		messages:{'estado':' *Campo Obligatorio'},
		debug: true,
		submitHandler: function(form)
		{
			form.submit();
		}
	});
	$('#frminsinsumos').validate
	({
		rules:{'fkdesinsumo':'required','stockmin':'required','unidad':'required'},
		messages:{'fkdesinsumo':' *Campo Obligatorio','stockmin':' *Campo Obligatorio','unidad':' *Campo Obligatorio'},
		debug: true,
		submitHandler: function(form)
		{
			form.submit();
		}
	});
	$('#frminsinsumosapro').validate
	({
		rules:{'fkdesinsumo':'required','stockmin':'required','unidad':'required','ordenc':'required'},
		messages:{'fkdesinsumo':' *Campo Obligatorio','stockmin':' *Campo Obligatorio','unidad':' *Campo Obligatorio','ordenc':' *Campo Obligatorio'},
		debug: true,
		submitHandler: function(form)
		{
			form.submit();
		}
	});
	$('#frmlogin').validate
	({
		rules:{'user':'required'},
		messages:{'user':' *Campo Obligatorio'},
		debug: true,
		submitHandler: function(form)
		{
			form.submit();
		}
	});
	/*$('#frminsinsumostipos').validate
	({
		rules:{'insumo':'required','tipo':'required','unidad':'required'},
		messages:{'insumo':' *Campo Obligatorio','tipo':' *Campo Obligatorio','unidad':' *Campo Obligatorio'},
		debug: true,
		submitHandler: function(form)
		{
			form.submit();
		}
	});*/
	/*$('#frmlogin').validate
	({
		 rules:
		 {
    		user: 
    		{
      			required: true,
      			remote: 'includes/conn1.php'
    		},
    		pass:{required: true}
  		},
  		messages:{user:{remote: jQuery.format("Email \"{0}\" have been used.")}, pass:'* Campo Obligatorio' },
  		debug: true,
		submitHandler: function(form)
		{
			form.submit();
		}
	});*/
	$('#frminsproveedor').validate
	({
		rules:{'name':'required','phone':'required','dir':'required','mail':'required'},
		messages:{'name':' *Campo Obligatorio','phone':' *Campo Obligatorio','dir':' *Campo Obligatorio','mail':' *Campo Obligatorio'},
		debug: true,
		submitHandler: function(form)
		{
			form.submit();
		}
	});
	$('#frminsrubros').validate
	({
		rules:{'tipo':'required','rubro':'required'},
		messages:{'tipo':' *Campo Obligatorio','rubro':' *Campo Obligatorio'},
		debug: true,
		submitHandler: function(form)
		{
			form.submit();
		}
	});
	$('#frminssolicitudes').validate
	({
		rules:{'estado':'required','user':'required'},
		messages:{'estado':' *Campo Obligatorio','user':' *Campo Obligatorio'},
		debug: true,
		submitHandler: function(form)
		{
			form.submit();
		}
	});
	$('#frminstipos').validate
	({
		rules:{'tipo':'required'},
		messages:{'tipo':' *Campo Obligatorio'},
		debug: true,
		submitHandler: function(form)
		{
			form.submit();
		}
	});
	$('#frminsunidadmedida').validate
	({
		rules:{'unidad':'required'},
		messages:{'unidad':' *Campo Obligatorio'},
		debug: true,
		submitHandler: function(form)
		{
			form.submit();
		}
	});
	$('#frminsusuarios').validate
	({
		rules:{'user':'required','password':'required','firstname':'required','lastname':'required','dpto':'required','nivel':'required','email':'required'},
		messages:{'user':' *Campo Obligatorio','password':' *Campo Obligatorio','firstname':' *Campo Obligatorio','lastname':' *Campo Obligatorio','dpto':' *Campo Obligatorio','nivel':' *Campo Obligatorio','email':' *Campo Obligatorio'},
		debug: true,
		submitHandler: function(form)
		{
			form.submit();
		}
	});
	$('#frmupdetalles').validate
	({
		rules:{'cant':'required'},
		messages:{'cant':' *Campo Obligatorio'},
		debug: true,
		submitHandler: function(form)
		{
			form.submit();
		}
	});
	$('#frmupdetentregas').validate
	({
		rules:{'cant':'required'},
		messages:{'cant':' *Campo Obligatorio'},
		debug: true,
		submitHandler: function(form)
		{
			form.submit();
		}
	});
}

function popup(url)
{
	var windows;
	windows=window.open(url,'name','height=800,width=840,menubar=yes, left=150,top=50,scrollbars=yes');
	if (window.focus) 
	{
		windows.focus();
	}
}

var clickedcount = 1;
function clone()
{
	$('#mainDiv').clone().attr('id', 'mainDiv'+clickedcount).appendTo('#displayblock');
	$('<span>',{class:'close', text:'Borrar'}).appendTo('#mainDiv'+clickedcount+' table td:last');
	clickedcount++;
}
function delclone()
{
	$('#displayblock div:last').slideUp('slow', del);
}
function del()
{
	$(this).remove();
}