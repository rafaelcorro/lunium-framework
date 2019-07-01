<?php
/* 
 * lunium-framework-php
 * @author  Rafael Corro Haba <rafaelcorro@gmail.com>
 */
require_once '../styles/themes/'.constant('TEMPLATE').'/header.php';
?>

<header class="major">
        <h2>Reservas</h2>
        <p>Evaluación de conocimientos</p>
</header>
<div class="container">
    <!-- Content -->
    <section id="content">
        <p><?php echo $this->message; ?></p>

        <section>
            <form action="<?php echo 'http://' . $_SERVER['SERVER_NAME'] . '/'.constant('DIRECTORY').'/main/searchActivity/';?>" method="POST">
                <div class="row uniform">
                    <div class="5u 8u">
                            <label for="date">Fecha de la actividad</label>

                            <input type="text" name="date" id="dp1" required>

                            <script>
                                    $(function() {
                                    $("#dp1").datepicker();
                            });
                            </script>

                    </div>
                    <div class="4u 4u">
                            <label for="numpeople">Nº de personas</label>
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

                    <div class="3u 3u">
                            <div style="height:27px;">&nbsp;</div>
                            <input type="submit" value="Buscar"/>
                    </div>
                </div>
                <div class="row uniform">
                    <!-- Table -->
                    <section style="width:100%;">
                        <h4>Actividades</h4>
                        <div class="table-wrapper">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    //echo var_dump($this->activity)."<---dump<br />";
                                    //include_once '../models/activity.php';
                                    foreach($this->activity as $row){
                                        echo "<tr>";
                                        foreach($row as $row2){
                                            echo "<td>".$row2."</td>";
                                        }
                                        echo "</tr>";
                                    }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </section>
                </div>
            </form>
        </section>
    </section>
</div>
			
<?php
require_once '../styles/themes/'.constant('TEMPLATE').'/footer.php';

