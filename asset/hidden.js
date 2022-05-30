$(document).ready(function(){
    $("select").change(function(){
        $(this).find("option:selected").each(function(){
            if($(this).attr("value")=="red"){
                $(".box").not(".red").hide();
                $(".red").show();
            }
            else if($(this).attr("value")=="Whatsapp"){
                $(".box").not(".Whatsapp").hide();
                $(".Whatsapp").show();
            }
            else if($(this).attr("value")=="Sms"){
                $(".box").not(".Sms").hide();
                $(".Sms").show();
            }
            else{
                $(".box").hide();
            }
        });
    }).change();
});
$(document).ready(function(){
	$(".1").click(function(){
	$('.div1').fadeToggle();
	});
	$(".2").click(function(){
	$('.div2').fadeToggle();
	});
	$(".3").click(function(){
	$('.div3').fadeToggle();
	});
	$(".4").click(function(){
	$('.div4').fadeToggle();
	});
	$(".5").click(function(){
	$('.div5').fadeToggle();
	});
	$(".6").click(function(){
	$('.div6').fadeToggle();
	});
	$(".7").click(function(){
	$('.div7').fadeToggle();
	});
	$(".8").click(function(){
	$('.div8').fadeToggle();
	});
	$(".9").click(function(){
	$('.div9').fadeToggle();
	});
});

$(document).ready(function(){
    $('input[name="hubungi"]').click(function(){
        if($(this).attr("value")=="Telepon"){
            $(".bix").not(".Telepon").hide();
            $(".Telepon").show();
        }
        if($(this).attr("value")=="Whatsapp"){
            $(".bix").not(".Whatsapp").hide();
            $(".Whatsapp").show();
        }
        if($(this).attr("value")=="Sms"){
            $(".bix").not(".Sms").hide();
            $(".Sms").show();
        }
		if($(this).attr("value")=="BBM"){
            $(".bix").not(".BBM").hide();
            $(".BBM").show();
        }
		if($(this).attr("value")=="Email"){
            $(".bix").not(".Email").hide();
            $(".Email").show();
        }
		
    });
	$('input[name="sumber"]').click(function(){
	if($(this).attr("value")=="Konsumen Sudah Belanja"){
            $(".bax").not(".nota").hide();
            $(".nota").show();
        }	
		if($(this).attr("value")=="Other"){
            $(".bax").not(".kontak").hide();
            $(".kontak").show();
        }
		if($(this).attr("value")=="Calon Pembeli"){
            $(".bax").not("").hide();
            $("").show();
        }
		if($(this).attr("value")=="After Service Customer"){
            $(".bax").not("").hide();
            $("").show();
        }
	});
});

function validangka(a)
{
	if(!/^[0-9]+$/.test(a.value))
	{
	a.value = a.value.substring(0,a.value.length-1);
	}
}
function validhuruf(a)
{
	if(!/^[a-zA-Z ]+$/.test(a.value))
	{
	a.value = a.value.substring(0,a.value.length-1);
	}
}

$(document).ready(function(){
    $("select").change(function(){
        $(this).find("option:selected").each(function(){
            if($(this).attr("value")=="sekarang"){
                $(".box").not(".sekarang").hide();
                $(".sekarang").show();
            }
        });
    }).change();
});


