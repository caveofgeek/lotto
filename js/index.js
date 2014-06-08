var length = 2;
var buy_lotto_row = 0;
var total_price = 0;

$(document).ready(function(){
	$("#3char").click(function(){
		$(".type-for-3char").css("display","block");
		length = $(this).val();
		$("#number").attr("maxlength", length);
	});

	$("#2char").click(function(){
		$(".type-for-3char").css("display","none");
		length = $(this).val();
		$("#number").attr("maxlength", length);
	});

	$("#3char2").click(function(){
		$(".type-for-3char2").css("display","block");
	});

	$("#2char2").click(function(){
		$(".type-for-3char2").css("display","none");
	});

	$("#3char3").click(function(){
		$(".type-for-3char3").css("display","block");
	});

	$("#2char3").click(function(){
		$(".type-for-3char3").css("display","none");
	});

	$("#3char4").click(function(){
		$(".type-for-3char4").css("display","block");
	});

	$("#2char4").click(function(){
		$(".type-for-3char4").css("display","none");
	});

	$("#number").keyup(function(){
		var numlength = $(this).val().length;
		var re = /[0-9]/;
		if (length == numlength && re.test($(this).val())){
			$("#alert-number").css("display","none");
			$(this).css("border","");
		}
		else {
			$("#alert-number").css("display","block");
			$(this).css("border","1px solid red");
		}
	});

	$("#price").keyup(function(){
		var re = /[0-9]/;
		if (re.test($(this).val())){
			$("#alert-price").css("display","none");
			$(this).css("border","");
			$("#sub_add_lotto").removeAttr("disabled", "disabled");
		}
		else {
			$("#alert-price").css("display","block");
			$(this).css("border","1px solid red");
			$("#sub_add_lotto").attr("disabled", "disabled");
		}
	});

	/* Index Action  */
	$("#sub_add_lotto").click(function(e){
		var data = $("#buy-lotto").serializeArray();
		add_lotto(data);

		e.preventDefault()
  	e.stopPropagation()
	});
});

function add_lotto(data) {
	buy_lotto_row++;
	var lotto_data = "<tr id =lotto" + buy_lotto_row + ">";
	var input_hidden ="";
	var unit_data = [];
	jQuery.each( data, function( i, field ) {
		var add_data = field.value;
		unit_data.push(add_data);
		var lotto_len = 0;
		switch (i) {
			case 1:
				lotto_len = parseInt(add_data);
				add_data += " ตัว";
				break;
			case 2:
				add_data = add_data == "up" ? "บน" : "ล่าง";
				break;
			case 3:
				if (lotto_len <= 2) {
					add_data = "-";
				}
				else{
					add_data = field.value == "teng" ? "เต้ง" : "โต๊ด";
				}
				break;
			case 5:
				total_price += parseFloat(add_data);
				add_data = parseFloat(add_data).toLocaleString("en-IN");
				break;
		}
		input_hidden = "<input type='hidden' name='lotto_data[]' id='lotto_hidden" + buy_lotto_row + "' value=" + unit_data + ">";
		//total_data[buy_lotto_row - 1] = unit_data;
		lotto_data +=	"<td>" + add_data + "</td>";
  });

  lotto_data +=	"<td> <a href='javascript:void(0)' onclick='del_data("+ buy_lotto_row +")'>ลบ</a> </td>";

	lotto_data +=	"</tr>";
	$("#confirm-lotto div").append(input_hidden);
	$("#table-lotto tbody").append(lotto_data);
	$("#buy-lotto").closest('form').find("input[type=text]").val("");
	summary_text();
}

function summary_text() {
	if (buy_lotto_row <= 0) {
		$("#sum_topic").text("");
		$("#qty").text("");
		$("#total_price").text("");
		total_data = [];
	} else {

		$("#sum_topic").text("รวมทั้งสิ้น");
		$("#qty").text(buy_lotto_row + " รายการ");
		$("#total_price").text(total_price.toLocaleString("en-IN") + " บาท");
	}
}

function del_data(rowindex) {
	var current_price = $("#table-lotto tbody tr#lotto"+rowindex+" td:eq(5)").html()
	$("#table-lotto tbody tr#lotto"+rowindex).remove();
	$("#confirm-lotto div input#lotto_hidden"+rowindex).remove();
	buy_lotto_row -= 1; // -2 because buy_lotto_row more than current row
	summary_text()
}