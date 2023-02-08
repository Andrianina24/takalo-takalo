<!-- slider section -->
<section class=" slider_section position-relative">
  <div class="design-box">
    <img src="<?php echo base_url(); ?>assets/images/design-1.png" alt="">
  </div>
  <div class="slider_number-container d-none d-md-block">
    <div class="number-box">
      <span>
        01
      </span>
      <hr>
      <span class="jwel">
        A <br>
        - <br>
        T <br>
        a <br>
        k <br>
        a <br>
        l <br>
        o
      </span>
      <hr>
      <span>
        02
      </span>
    </div>
  </div>
  <div class="item_section layout_padding2">
    <div class="container" style="margin-left: 287px;">
      <div class="item_container">
        <?php if (isset($liste)) { ?>
          <?php foreach ($liste as $objet) { ?>
            <?php if (!empty($objet)) { ?>
              <?php $this->load->model('Model');
              $cnom = $this->Model->personne($_SESSION['mail']); ?>
              <div class="box">
                <div class="price">
                  <h6>
                    <?php echo $objet['nom_objet'] ?>
                  </h6>
                  <h9>
                    Propriétaire:
                    <?php echo $objet['nom'] ?>
                  </h9>
                </div>
                <div class="img-box">
                  <img src="<?php echo base_url(); ?>assets/images/<?php echo $objet['img'] ?>" alt="">
                </div>
                <div class="name">
                  <h5>
                    <?php echo $objet['descri'] ?>
                  </h5>
                  <h5>
                    <?php echo $objet['prix'] ?> Ar
                    <?php if ($cnom['nom'] != $objet['nom']) { ?>
                      <div>
                        <a href="<?php echo base_url('welcome/echange'); ?>?personne=<?php echo $objet['nomu'] ?>&objet=<?php echo $objet['id_objet'] ?>"
                          style="color: green; ">Echanger</a>
                      </div>
                    <?php } ?>
                  </h5>
                </div>
              </div>
            <?php } ?>
          <?php } ?>
        <?php } ?>
      </div>
    </div>
  </div>

</section>
<!-- end slider section -->
</div>