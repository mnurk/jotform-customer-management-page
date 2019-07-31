
	<script>
		function searchFunction() {
			var input, filter, table, tr, td, i, txtValue;
			input = document.getElementById("searchInput");
			filter = input.value.toUpperCase();
			table = document.getElementById("customerTable");
			tr = table.getElementsByTagName("tr");
			for (i = 0; i < tr.length; i++) {
    			td = tr[i].getElementsByTagName("td")[1];
    			if (td) {
					txtValue = td.textContent || td.innerText;
      				if (txtValue.toUpperCase().indexOf(filter) > -1) {
        				tr[i].style.display = "";
      				} else {
       					 tr[i].style.display = "none";
      				}
   				 }
  			}
		}
	</script>
	<script>
		var collapsible = document.getElementsByClassName("collapsible");
		var hide = document.getElementsByClassName("hide");

		for (let i = 0; i < collapsible.length; ++i) {
			collapsible[i].addEventListener("click", function() {
				if (hide[i].style.display === "none") {
					hide[i].style.display = "contents";
				} else {
					hide[i].style.display = "none";
				}
			});

		}
	</script>
	
</body>


</body>
</html>