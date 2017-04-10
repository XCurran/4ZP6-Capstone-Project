
// The following function goes over every single NRTI (in both columns) and then compares the same ones. If two of the same NRTIs are selected, an error is given and the 
// combo page does not advance to the results page.

function check() {
			var v1=document.getElementById("Abacavir");
			var v2=document.getElementById("Didanosine");
			var v3=document.getElementById("Lamivudine");
			var v4=document.getElementById("Stavudine");
			var v5=document.getElementById("Tenofovir Disoproxil Fumarate");
			var v6=document.getElementById("Zidovudine");
			
			var v11=document.getElementById("Abacavir1");
			var v21=document.getElementById("Didanosine1");
			var v31=document.getElementById("Lamivudine1");
			var v41=document.getElementById("Stavudine1");
			var v51=document.getElementById("Tenofovir Disoproxil Fumarate1");
			var v61=document.getElementById("Zidovudine1");
			
			if (v1.checked == true && v11.checked == true){
				alert("select differnet NRTIs")
				return false;
			}
			else if (v2.checked == true && v21.checked == true){
				alert("select differnet NRTIs")
				return false;
			}
			else if (v3.checked == true && v31.checked == true){
				alert("select differnet NRTIs")
				return false;
			}
			else if (v4.checked == true && v41.checked == true){
				alert("select differnet NRTIs")
				return false;
			}
			else if (v5.checked == true && v51.checked == true){
				alert("select differnet NRTIs")
				return false;
			}
			else if (v6.checked == true && v61.checked == true){
				alert("select differnet NRTIs")
				return false;
			}
			
		}