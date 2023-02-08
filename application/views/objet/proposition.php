<div class="item_section layout_padding2">
  <div class="container">
    <div class="item_container">
      <?php if (isset($liste)) { ?>
        <?php foreach ($liste as $objet) { ?>
          <?php if (!empty($objet)) { ?>
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
            </div>
          <?php } ?>
        <?php } ?>
      <?php } ?>
    </div>
  </div>
</div>