 function validateForm() {
            var title = document.forms["myform"]["title"].value;
            var subtitle = document.forms["myform"]["subtitle"].value;
            var author = document.forms["myform"]["author"].value;
            var content = document.forms["myform"]["content"].value;

            if (title === "" || subtitle === "" || author === "" || content === "") {
                alert("All fields are mandatory. Please fill in all required fields.");
                return false;
            }
        }