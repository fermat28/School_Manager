
@include("gabarits.header" , ['photo' => $photo , 'nom' => $nom , 'prenom' => $prenom ])

<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box
}

body {
    background-color: #333
}

.container {
    background-color: #555;
    color: #ddd;
    border-radius: 10px;
    padding: 20px;
    font-family: 'Montserrat', sans-serif;
    max-width: 700px
}

.container>p {
    font-size: 32px
}

.question {
    width: 75%
}

.options {
    position: relative;
    padding-left: 40px
}

#options label {
    display: block;
    margin-bottom: 15px;
    font-size: 14px;
    cursor: pointer
}

.options input {
    opacity: 0
}

.checkmark {
    position: absolute;
    top: -1px;
    left: 0;
    height: 25px;
    width: 25px;
    background-color: #555;
    border: 1px solid #ddd;
    border-radius: 50%
}

.options input:checked~.checkmark:after {
    display: block
}

.options .checkmark:after {
    content: "";
    width: 10px;
    height: 10px;
    display: block;
    background: white;
    position: absolute;
    top: 50%;
    left: 50%;
    border-radius: 50%;
    transform: translate(-50%, -50%) scale(0);
    transition: 300ms ease-in-out 0s
}

.options input[type="radio"]:checked~.checkmark {
    background: #21bf73;
    transition: 300ms ease-in-out 0s
}

.options input[type="radio"]:checked~.checkmark:after {
    transform: translate(-50%, -50%) scale(1)
}

.btn-primary {
    background-color: #555;
    color: #ddd;
    border: 1px solid #ddd
}

.btn-primary:hover {
    background-color: #21bf73;
    border: 1px solid #21bf73
}

.btn-success {
    padding: 5px 25px;
    background-color: #21bf73
}

@media(max-width:576px) {
    .question {
        width: 100%;
        word-spacing: 2px
    }
}
</style>
<section id="main-content">
    <section class="wrapper site-min-height">
        <div class="row mt">
            <div class="col-lg-12">
                <div class="row content-panel">
                    <div class="col-md-4 profile-text mt mb centered">
                        <div class="right-divider">
<center><div class="container mt-sm-5 my-1">
    <div class="question ml-sm-5 pl-sm-5 pt-2">
        <div class="py-2 h5"><b>Q. which option best describes your job role?</b></div>
        <div class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3" id="options"> <label class="options">Small Business Owner or Employee <input type="radio" name="radio"> <span class="checkmark"></span> </label> <label class="options">Nonprofit Owner or Employee <input type="radio" name="radio"> <span class="checkmark"></span> </label> <label class="options">Journalist or Activist <input type="radio" name="radio"> <span class="checkmark"></span> </label> <label class="options">Other <input type="radio" name="radio"> <span class="checkmark"></span> </label> </div>
    </div>
    <div class="d-flex align-items-center pt-3">
        <div id="prev"> <button class="btn btn-primary">Previous</button> </div>
        <div class="ml-auto mr-sm-5"> <button class="btn btn-success">Next</button> </div>
    </div>
</div></center>
                        </div>
                        </div>
                        </div>
                        </div>
                        </div>
    </section>
    </section>
@include("gabarits.footer")
