
<div class="wraper">
    <div id="admin-page">
        <div class="container-fluid ">

            <div class="row">
                
                <div class="col-md-12 col-sm-12 col-xs-12">
                <h1>Вітаю Адмін</h1>

                    <!-- Modal -->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Закрити</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Редагування Повідомлення</h4>
                                </div>
                                <div class="modal-body">

                                    <form data-toggle="validator" role="form" id="user-update"  method="post">

                                        <input  class="hidden" type="text" name="id" />

                                        <div class="form-group">
                                            <textarea rows="10" cols="45" name="text-update" placeholder="Text" required></textarea>
                                        </div>


                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Зберегти зміни</button>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Закрити</button>
                                        </div>

                                    </form>
                                    

                                </div>

                            </div>
                        </div>
                    </div>


                        <table class='table table-striped'>
                            <th>id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Website</th>
                            <th>Text</th>
                            <th>Ip</th>
                            <th>Brouser</th>
                            <th>Data</th>
                            <th></th>
                            <th></th>
                            </tr>
                        <?php

                        $row = $data['sortedRows'];
                        $pages = $data['pagesCount'];
                        
                        foreach ($row as $array) {
                            echo "<tr class='costumer-record'>";
                            echo  "<td id='user-id'>" . $array['id'] . "\n" . "</td>";
                            echo "<td  id='user-name'>" . $array['name'] . "\n" . "</td>";
                            echo "<td  id='user-email'>" . $array['email'] . "\n" . "</td>";
                            echo "<td  id='user-website'>" . $array['website'] . "\n" . "</td>";
                            echo "<td  id='user-text'>" . $array['text'] . "\n" . "</td>";
                            echo  "<td id='user-ip'>". $array['ip'] . "\n" . "</td>";
                            echo  "<td id='user-brouser'>". $array['brouser'] . "\n" . "</td>";
                            echo  "<td id='user-data'>". $array['data'] . "\n" . "</td>";
                            echo  "<td class=' delete' ><i class=\"fa fa-trash-o\" aria-hidden=\"true\"></i></td>";
                            echo  "<td class='user-update'><i class=\"fa fa-pencil-square-o\" aria-hidden=\"true\"  data-toggle=\"modal\" data-target=\"#myModal\" ></i> </td>";
                            echo "</tr>";
                        }
                        ?>
                        </table>
                     
                        <?php for ($i=1 ; $i<=$pages; $i++) {
                            if ($pages == 1) {
                                echo "<button  class=' btn btn-default btn-lg active '>$i</button>";
                            }else {
                                echo "
                        <button  class=' btn btn-default btn-lg active  pagination'>$i</button> ";
                        
                            }
                        } ?>
                    <a href="/"><button class="btn btn-primary btn-lg active"> На Головну</button></a>
                    <a href="main/logOut"><button  class=" btn btn-primary btn-lg active"> logout</button></a>
                    
                    <div class="sorted-block">
                    <button  class=" btn btn-primary btn-lg active sort-by-descending"> Сортувати :</button>

                    <div class="checked-block">
                        <select id="sorted-way" class="form-control styled-select">
                            <option>Спаданню </option>
                            <option>Зростанню</option>
                        </select>
                    </div>
                    <div class="checked-block">
                        <select id="sorted-value" class="form-control styled-select" >
                            <option>name</option>
                            <option>email</option>
                            <option>data</option>
                        </select>
                    </div>
                </div>

                </div>
            </div>
        </div>
    </div>
</div>

