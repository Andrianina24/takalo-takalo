<div class="item_section layout_padding2">
  <div class="container">
    <div class="item_container">
      <?php if (isset($liste)) { ?>
        <?php foreach ($liste as $objet) { ?>
          <?php if (!empty($objet)) { ?>
            <?php $this->load->model('Model');
                  $cnom=$this->Model->personne($_SESSION['mail']);
            if ($cnom['nom'] == $objet['client']) { ?>
              <div class="box">
                <div>
                  <div class="price">
                    <h6>
                      <?php echo $objet['objet1'] ?>
                    </h6>
                  </div>
                  <div class="img-box">
                    <img src="<?php echo base_url(); ?>assets/images/<?php echo $objet['img1'] ?>" alt="">
                  </div>
                  <div class="name">
                    <h5>
                      <?php echo $objet['d1'] ?>
                    </h5>
                    <h5>
                      <?php echo $objet['p1'] ?> Ar
                    </h5>
                  </div>
                  <h5 style="color: green; text-align: center;">
                    ET
                  </h5>
                  <div>
                    <div class="price">
                      <h6>
                        <?php echo $objet['objet2'] ?>
                      </h6>
                    </div>
                    <div class="img-box">
                      <img src="<?php echo base_url(); ?>assets/images/<?php echo $objet['img2'] ?>" alt="">
                    </div>
                    <div class="name">
                      <h5>
                        <?php echo $objet['d2'] ?>
                      </h5>
                      <h5>
                        <?php echo $objet['p2'] ?> Ar
                      </h5>
                    </div>
                  </div>
                  <div>
                    <div><a
                        href="<?php echo base_url('welcome/accept'); ?>?idp=<?php echo $objet['id_proposition'] ?>&p1=<?php echo $objet['c2'] ?>&p2=<?php echo $objet['c1'] ?>&objet1=<?php echo $objet['id1'] ?>&objet2=<?php echo $objet['id2'] ?>">Accept</a>
                    </div>
                    <div><a href="<?php echo base_url('welcome/decline'); ?>?idp=<?php echo $objet['id_proposition'] ?>" style="color: red; ">Decline</a></div>
                  </div>
                </div>
              <?php } ?>
            <?php } ?>
          <?php } ?>
        <?php } ?>
      </div>
    </div>
  </div>