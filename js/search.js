/*
  These functions are used in the admin backend, for member lookup by administrators.
*/


function searchusers() { // Search users by name, e.g. "Jasper Platenburg"

    /*
        Property of www.w3schools.com
    */

    // Declare variables
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("gebruikersZoeken"); // The search bar
    filter = input.value.toUpperCase();
    table = document.getElementById("gebruikersTabel"); // The table
    tr = table.getElementsByTagName("tr");
  
    // Loop through all table rows, and hide those which don't match the search query
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[2];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = ""; // Show
        } else {
          tr[i].style.display = "none"; // Hide
        }
      }
    }
  }

  function searchusersbyid() { // Search by ID, e.g. "48273"

    /*
        Property of www.w3schools.com
    */

    // Declare variables
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("gebruikersZoekenId"); // The search bar
    filter = input.value.toUpperCase();
    table = document.getElementById("gebruikersTabel"); // The table
    tr = table.getElementsByTagName("tr");
  
    // Loop through all table rows, and hide those which don't match the search query
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[0];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = ""; // Show
        } else {
          tr[i].style.display = "none"; // Hide
        }
      }
    }
  }

  function searchusersbyclass() { // Searching by class, e.g. "PNB_H5A"

    /*
        Property of www.w3schools.com
    */

    // Declare variables
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("gebruikersZoekenKlas"); // The search bar
    filter = input.value.toUpperCase();
    table = document.getElementById("gebruikersTabel"); // The table
    tr = table.getElementsByTagName("tr");
  
    // Loop through all table rows, and hide those which don't match the search query
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[5];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = ""; // Show
        } else {
          tr[i].style.display = "none"; // Hide
        }
      }
    }
  }