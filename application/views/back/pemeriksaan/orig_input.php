<?php $no=1; 
                                  foreach($pertanyaan as $pr) { ?>

                                  <div class="form-group">
                                      <label for="" class="col-lg-6"><?php echo $no++; ?>.&nbsp <?php echo $pr['kategori'];?></label>
                                        
                                      <div class=" custom-radio">
                                          <input type="radio" class="custom-control-input" id="<?php echo $pr['id_gejala'];?>" name="<?php echo $pr['gejala'];?>" value="<?php echo $pr['bobot_gj'];?>">
                                          <label class="custom-control-label" for="<?php echo $pr['gejala'];?>"><?php echo $pr['gejala']; ?></label>
                                        </div>

                                        <!-- Group of default radios - option 2 -->
                                        <div class=" custom-radio">
                                          <input type="radio" class="custom-control-input" id="<?php echo $pr['gejala'];?>" name="<?php echo $pr['gejala'];?>" value="<?php echo $pr['bobot_gj'];?>">
                                          <label class="custom-control-label" for="<?php echo $pr['gejala'];?>"><?php echo $pr['gejala']; ?></label>
                                        </div>

                                        <!-- Group of default radios - option 3 -->
                                        <div class=" custom-radio">
                                          <input type="radio" class="custom-control-input" id="<?php echo $pr['gejala'];?>" name="<?php echo $pr['gejala'];?>" value="<?php echo $pr['bobot_gj'];?>">
                                          <label class="custom-control-label" for="<?php echo $pr['gejala'];?>"><?php echo $pr['gejala']; ?></label>
                                        </div>

                                        <div class=" custom-radio">
                                          <input type="radio" class="custom-control-input" id="<?php echo $pr['gejala'];?>" name="<?php echo $pr['gejala'];?>" value="<?php echo $pr['bobot_gj'];?>">
                                          <label class="custom-control-label" for="<?php echo $pr['gejala'];?>"><?php echo $pr['gejala']; ?></label>
                                        </div>

                                       

  
                                  </div>

                                      <!-- Group of default radios - option 1 -->
                                        

                                  <?php } ?>