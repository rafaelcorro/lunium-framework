<?php
/**
 * Lunium Framework
 *
 * @author      Rafael Corro Haba <rafaelcorro@gmail.com>
 * @link        https://github.com/rafaelcorro/lunium-framework
 * @license     MIT
 *
 */
?>

 <section>
    <div class="container">
      <div class="row align-items-center">    

<header class="major">
    <h2>Página principal</h2>
    <p>Estructura en pruebas</p>
</header>
          </div>
    </div>
</section>

<section>
    <div class="container">
      <div class="row align-items-center">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">Basic Form</h5>
                <div class="card-body">
                  
            <form action="<?php echo 'http://' . $_SERVER['SERVER_NAME'] . '/'.constant('DIRECTORY').'/public/main/searchActivity/';?>" method="POST">

    
                        <div class="form-group">
                            <label for="date" class="col-form-label">Fecha de la actividad</label>
                            <input type="text" name="date" id="dp1" class="form-control" required>
                        </div>
                        <script>
                            $(function() {
                                $("#dp1").datepicker({
                                    dateFormat: 'dd/mm/yy'
                                });
                            });
                        </script>
                        <!--
                            $('.datepicker').datetimepicker({
                                format: 'DD-MM-YYYY HH:mm:ss'
                            });
                        -->
        
                    <div class="form-group">
                        
                        <label for="numpeople" class="col-form-label">Nº de personas</label>
                        <select name="numpeople">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                        </select>
                    </div>

                    <div class="form-group">
                            <div style="height:27px;">&nbsp;</div>
                            <button type="submit" class="mb-2 btn btn-primary mr-2">Buscar</button>
                    </div>
            </form>
                </div></div>
        </div>
      </div>
    </div>
</section>
<section>
    <div class="container">
      <div class="row align-items-center">
              <div class="col">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Active Users</h6>
                  </div>
                  <div class="card-body p-0 pb-3 text-center">
                    <table class="table mb-0">
                      <thead class="bg-light">
                        <tr>
                          <th scope="col" class="border-0">#</th>
                          <th scope="col" class="border-0">Name</th>
                          <th scope="col" class="border-0">Description</th>
                          <th scope="col" class="border-0">Date Start</th>
                          <th scope="col" class="border-0">Date Fin</th>
                          <th scope="col" class="border-0">Price</th>
                          <th scope="col" class="border-0">Rate</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php
                              
                            if(isset($this->activity)){
                                foreach($this->activity as $row){
                                    echo "<tr>";
                                    foreach($row as $row2){
                                        echo "<td>".$row2."</td>";
                                    }
                                    echo "</tr>";
                                }
                            }else{
                                echo "<tr><td style='color:red' colspan='7'> No results found!</td></tr>";
                            }

                            ?>
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
      </div>
    </div>
</section>
