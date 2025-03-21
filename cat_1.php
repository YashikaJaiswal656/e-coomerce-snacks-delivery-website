<?php include("header_2.php")?>


            <div class="col-lg-5 border rounded-2 p-3">
                <h2>Category Insert</h2>
                <form action="cat_1_insert.php" method="POST" >
                    <div class="mb-3">
                        <label class="form-label">catetory</label>
                        <input type="text" class="form-control cat" name="cat" oninput="fun_1()">
                    </div>
                    <div class="mb-3">
                        
                        <input type="hidden" name="slug" class="form-control cat_1" >
                    </div>
                    <h2>Product Type Insert</h2>
                    <div class="mb-3">
                        <label class="form-label">Product Type</label>
                        <input type="text" class="form-control cat_2" name="cat_2" oninput="fun_2()">
                    </div>
                    <div class="mb-3">
                        
                        <input type="hidden" name="slug_2" class="form-control cat_3" >
                    </div>
                  
                    
                    <input type="submit" value="Submit" class="btn btn-primary">
                </form>
            </div>

            
        </div>
    </div>
    <script>
fun_1=()=>{
    let text=document.querySelector(".cat").value;
    text=text.toLowerCase()
    document.querySelector(".cat_1").value=text.replaceAll(' ','-');
}
fun_2=()=>{
    let text_1=document.querySelector(".cat_2").value;
    text_1=text_1.toLowerCase()
    document.querySelector(".cat_3").value=text_1.replaceAll(' ','-');
}

    </script>
  <?php include("footer_2.php")?>