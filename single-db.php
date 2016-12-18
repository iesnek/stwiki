<?php get_header(); ?>

<div class="l-wrap clearfix">

<div class="breadcrumb">
<?php if(function_exists('bcn_display')) { bcn_display(); } ?>
</div><!-- .m-breadcrumb -->

<main id="main" class="l-main">

<?php
if (have_posts()) :
  while (have_posts()) : the_post();

///////////////////// アドバンスドカスタムフィールドの値を取得
  $rarity = get_field('rarity'); // 基本情報-レアリティ
  $img = get_field('img'); // 基本情報-画像
  $imgurl = wp_get_attachment_image_src($img, 'large'); // 基本情報-画像
  $cost = get_field('cost'); // 基本情報-コスト
  $resonance_rarity1 = get_field('resonance_rarity1'); // 共鳴-レアリティ1
  $resonance_name1 = get_field('resonance_name1'); // 共鳴-名前1
  $resonance_rarity2 = get_field('resonance_rarity2'); // 共鳴-レアリティ2
  $resonance_name2 = get_field('resonance_name2'); // 共鳴-名前2
  $resonance_rarity3 = get_field('resonance_rarity3'); // 共鳴-レアリティ3
  $resonance_name3 = get_field('resonance_name3'); // 共鳴-名前3
  $resonance_rarity4 = get_field('resonance_rarity4'); // 共鳴-レアリティ4
  $resonance_name4 = get_field('resonance_name4'); // 共鳴-名前4
  $attack_n = get_field('attack_n'); // 通常時ステータス-攻撃
  $defence_n = get_field('defence_n'); // 通常時ステータス-防御
  $speed_n = get_field('speed_n'); // 通常時ステータス-早さ
  $mental_n = get_field('mental_n'); // 通常時ステータス-気合
  $limit_break = get_field('limit_break'); // 限界突破するか否か
  $attack_l = get_field('attack_l'); // 限界突破時ステータス-攻撃
  $defence_l = get_field('defence_l'); // 限界突破時ステータス-防御
  $speed_l = get_field('speed_l'); // 限界突破時ステータス-早さ
  $mental_l = get_field('mental_l'); // 限界突破時ステータス-気合
  $make_description = get_field('make_description'); // キャラメイク-説明
  $color = get_field('color'); // カラーバリエーション
  $skill_type = get_field('skill_type'); // 奥義-奥義タイプ
  $skill_title = get_field('skill_title'); // 奥義-奥義名
  $mental_cost = get_field('mental_cost'); // 奥義-消費コスト
  $effect = get_field('effect'); // 奥義-効果
  $effect_description = get_field('effect_description'); // 奥義-効果説明
  $skill_area = get_field('skill_area'); // 奥義-奥義範囲
  $spell_name = get_field('spell_name'); // 陰陽秘術-秘術名
  $spell_effect = get_field('spell_effect'); // 陰陽秘術-効果
  $other_meta = get_field('other_meta'); // その他情報

///////////////////// そのページのタクソノミーを取得
  $bushi = is_object_in_term($post->ID, 'equip','bushi');
  $yari = is_object_in_term($post->ID, 'equip','yari');
  $yumi = is_object_in_term($post->ID, 'equip','yumi');
  $miko = is_object_in_term($post->ID, 'equip','miko');
  $ninja = is_object_in_term($post->ID, 'equip','ninja');
  $yokenshi = is_object_in_term($post->ID, 'equip','yokenshi');
    $head = is_object_in_term($post->ID, 'equip','head');
    $mask = is_object_in_term($post->ID, 'equip','mask');
    $neck = is_object_in_term($post->ID, 'equip','neck');
    $body = is_object_in_term($post->ID, 'equip','body');
    $waist = is_object_in_term($post->ID, 'equip','waist');
    $shoulder = is_object_in_term($post->ID, 'equip','shoulder');
    $arm = is_object_in_term($post->ID, 'equip','arm');
    $leg = is_object_in_term($post->ID, 'equip','leg');
  $inner = is_object_in_term($post->ID, 'equip','inner');
  $outer = is_object_in_term($post->ID, 'equip','outer');
  $shoes = is_object_in_term($post->ID, 'equip','shoes');
  $front = is_object_in_term($post->ID, 'equip','front');
  $option = is_object_in_term($post->ID, 'equip','option');
    $fuda_bushi = is_object_in_term($post->ID, 'equip','bushi-fuda');
    $fuda_yari = is_object_in_term($post->ID, 'equip','yari-fuda');
    $fuda_yumi = is_object_in_term($post->ID, 'equip','yumi-fuda');
    $fuda_miko = is_object_in_term($post->ID, 'equip','miko-fuda');
    $fuda_ninja = is_object_in_term($post->ID, 'equip','ninja-fuda');
    $fuda_yokenshi = is_object_in_term($post->ID, 'equip','yokenshi-fuda');
  $hair = is_object_in_term($post->ID, 'equip','hair');
  $eye = is_object_in_term($post->ID, 'equip','eye');
  $mouth = is_object_in_term($post->ID, 'equip','mouth');
  $face = is_object_in_term($post->ID, 'equip','face');
  $skin = is_object_in_term($post->ID, 'equip','skin');
  $background = is_object_in_term($post->ID, 'equip','background');
?>

<article id="post-<?php the_ID(); ?>" class="l-article article">
  <h1><?php echo $rarity . '&nbsp;'; the_title(); ?></h1>
  <div class="l-section clearfix">
    <div class="equipImg">
    <?php if($imgurl): ?>
      <img src="<? echo $imgurl[0]; ?>" alt="<?php the_title(); ?>">
    <?php else: if($bushi): ?>
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/noimg-bushi.png" alt="">
      <?php elseif($yari): ?>
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/noimg-yari.png" alt="">
      <?php elseif($yumi): ?>
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/noimg-yumi.png" alt="">
      <?php elseif($miko): ?>
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/noimg-miko.png" alt="">
      <?php elseif($ninja): ?>
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/noimg-ninja.png" alt="">
      <?php elseif($yokenshi): ?>
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/noimg-yokenshi.png" alt="">
      <?php elseif($fuda_bushi || $fuda_yari || $fuda_yumi || $fuda_miko || $fuda_ninja || $fuda_yokenshi): ?>
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/noimg-fuda.png" alt="">
      <?php else: ?>
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/noimg-item.png" alt="">
    <?php endif; endif; ?>
    </div>

    <div class="equipInfo_wrap">
      <section class="equipInfo equipBasic">
        <h2>基本情報</h2>
        <dl>
          <dt><?php if($bushi || $yari || $yumi || $miko || $ninja || $yokenshi || $fuda_bushi || $fuda_yari || $fuda_yumi || $fuda_miko || $fuda_ninja || $fuda_yokenshi){ echo 'ジョブ(職業)'; } else{ echo '部位'; } ?></dt>
          <dd><?php if ($terms = get_the_terms($post->ID, 'equip')) { foreach ( $terms as $term ) { echo esc_html($term->name); }} ?></dd>
        </dl>
        <dl>
          <dt>コスト</dt>
          <dd><?php if($cost) { echo $cost; } else { echo '入力する'; } ?></dd>
        </dl>
        <dl>
          <dt>共鳴</dt>
          <dd>
            <?php
            if($resonance_name1) { echo $resonance_rarity1 . '&nbsp;' . $resonance_name1; } else { echo '-'; }
            if($resonance_name2) { echo '<br>' . $resonance_rarity2 . '&nbsp;' . $resonance_name2; }
            if($resonance_name3) { echo '<br>' . $resonance_rarity3 . '&nbsp;' . $resonance_name3; }
            if($resonance_name4) { echo '<br>' . $resonance_rarity4 . '&nbsp;' . $resonance_name4; }
            ?>
          </dd>
        </dl>
      </section><!-- .equipBasic -->
      <section class="equipInfo status_n">
        <h2>通常時ステータス</h2>
        <div class="equipStatus">
          <dl>
            <dt>攻撃</dt>
            <dd><?php if($attack_n){ echo $attack_n; } elseif($attack_l){ echo round($attack_l / 1.1,0); } else{ echo '-'; } ?></dd>
          </dl>
          <dl>
            <dt>防御</dt>
            <dd><?php if($defence_n){ echo $defence_n; } elseif($defence_l){ echo round($defence_l / 1.1,0); } else{ echo '-'; } ?></dd>
          </dl>
          <dl>
            <dt>早さ</dt>
            <dd><?php if($speed_n){ echo $speed_n; } elseif($speed_l){ echo round($speed_l / 1.1,0); } else{ echo '-'; } ?></dd>
          </dl>
          <dl>
            <dt>気合</dt>
            <dd><?php if($mental_n){ echo $mental_n; } elseif($mental_l){ echo round($mental_l / 1.1,0); } else{ echo '-'; } ?></dd>
          </dl>
          <dl>
            <dt>合計</dt>
            <dd><?php if($attack_n && $defence_n && $speed_n && $mental_n){ echo $attack_n + $defence_n + $speed_n + $mental_n; } elseif($attack_l && $defence_l && $speed_l && $mental_l){ echo round($attack_l / 1.1,0) + round($defence_l / 1.1,0) + round($speed_l / 1.1,0) + round($mental_l / 1.1,0); } else{ echo '-'; } ?></dd>
          </dl>
        </div><!-- .equipStatus -->
      </section><!-- .status_n -->
      <section class="equipInfo status_l">
        <h2>限界突破時ステータス</h2>
        <div class="equipStatus">
          <dl>
            <dt>攻撃</dt>
            <dd><?php if($attack_l){ echo $attack_l; } elseif($attack_n && $limit_break){ echo round($attack_n * 1.1,0); } else{ echo '-'; } ?></dd>
          </dl>
          <dl>
            <dt>防御</dt>
            <dd><?php if($defence_l){ echo $defence_l; } elseif($defence_n && $limit_break){ echo round($defence_n * 1.1,0); } else{ echo '-'; } ?></dd>
          </dl>
          <dl>
            <dt>早さ</dt>
            <dd><?php if($speed_l){ echo $speed_l; } elseif($speed_n && $limit_break){ echo round($speed_n * 1.1,0); } else{ echo '-'; } ?></dd>
          </dl>
          <dl>
            <dt>気合</dt>
            <dd><?php if($mental_l){ echo $mental_l; } elseif($mental_n && $limit_break){ echo round($mental_n * 1.1,0); } else{ echo '-'; } ?></dd>
          </dl>
          <dl>
            <dt>合計</dt>
            <dd><?php if($attack_l && $defence_l && $speed_l && $mental_l){ echo $attack_l + $defence_l + $speed_l + $mental_l; } elseif($attack_n && $defence_n && $speed_n && $mental_n && $limit_break){ echo round($attack_n * 1.1,0) + round($defence_n * 1.1,0) + round($speed_n * 1.1,0) + round($mental_n * 1.1,0); } else{ echo '-'; } ?></dd>
          </dl>
        </div><!-- .equipStatus -->
      </section><!-- .status_l -->
    </div><!-- .equipInfo -->
  </div><!-- /.l-section clearfix -->

  <p class="notes">上段…通常時MAXステータス,　下段…限界突破時MAXステータス<br>※各ステータス値は、これまでに確認できた最大の値を入れています。強化のされ方によって±5程度の個体差がある場合があります。</p>

<?php if($bushi || $yari || $yumi || $miko || $ninja || $yokenshi): ?>
  <section class="l-section equipskill clearfix">
    <div class="equipInfo skillInfo">
      <h2>奥義</h2>
      <dl>
        <dt>合戦奥義</dt>
        <dd><?php if($skill_type == 'war' && $skill_title){ echo $skill_title; } else{ echo '-'; } ?></dd>
      </dl>
      <dl>
        <dt>会得奥義</dt>
        <dd><?php if($skill_type == 'battle' && $skill_title){ echo $skill_title; } else{ echo '-'; } ?></dd>
      </dl>
      <dl>
        <dt>消費気合</dt>
        <dd><?php if($mental_cost){ echo $mental_cost; } elseif($skill_title){ echo '入力する'; } else{ echo '-'; } ?></dd>
      </dl>
      <dl>
        <dt>効果</dt>
        <dd><?php if($effect){ echo $effect; } elseif($skill_title){ echo '入力する'; } else{ echo '-'; } ?></dd>
      </dl>
      <p><?php if($effect_description){ echo $effect_description; } elseif($skill_title){ echo '入力する'; } else{ echo '-'; } ?></p>
    </div><!-- .equipInfo skillInfo -->
    <div class="skillArea">
      <ul>
        <li class="<?php if( in_array('001', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('002', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('003', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('004', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('005', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('006', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('007', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('008', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('009', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('010', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('011', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
      </ul>
      <ul>
        <li class="<?php if( in_array('012', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('013', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('014', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('015', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('016', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('017', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('018', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('019', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('020', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('021', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('022', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
      </ul>
      <ul>
        <li class="<?php if( in_array('023', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('024', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('025', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('026', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('027', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('028', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('029', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('030', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('031', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('032', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('033', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
      </ul>
      <ul>
        <li class="<?php if( in_array('034', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('035', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('036', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('037', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('038', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('039', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('040', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('041', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('042', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('043', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('044', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
      </ul>
      <ul>
        <li class="<?php if( in_array('045', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('046', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('047', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('048', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('049', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('050', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('051', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('052', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('053', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('054', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('055', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
      </ul>
      <ul>
        <li class="<?php if( in_array('056', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('057', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('058', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('059', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('060', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="i"></li>
        <li class="<?php if( in_array('062', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('063', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('064', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('065', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('066', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
      </ul>
      <ul>
        <li class="<?php if( in_array('067', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('068', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('069', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('070', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('071', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('072', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('073', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('074', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('075', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('076', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('077', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
      </ul>
      <ul>
        <li class="<?php if( in_array('078', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('079', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('080', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('081', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('082', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('083', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('084', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('085', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('086', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('087', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('088', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
      </ul>
      <ul>
        <li class="<?php if( in_array('089', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('090', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('091', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('092', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('093', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('094', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('095', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('096', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('097', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('098', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('099', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
      </ul>
      <ul>
        <li class="<?php if( in_array('100', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('101', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('102', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('103', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('104', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('105', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('106', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('107', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('108', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('109', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('110', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
      </ul>
      <ul>
        <li class="<?php if( in_array('111', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('112', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('113', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('114', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('115', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('116', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('117', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('118', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('119', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('120', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
        <li class="<?php if( in_array('121', (array)$skill_area ) ){ echo 'in'; } else{ echo 'out'; } ?>"></li>
      </ul>
    </div><!-- .skillArea -->
  </section><!-- .l-section equipskill clearfix -->
<?php endif; ?>

  <section class="l-section equipInfo equipMake">
    <h2>説明</h2>
    <p><?php if($make_description){ echo $make_description; } else{ echo '入力する'; } ?></p>
  </section><!-- .l-section equipInfo equipMake -->

<?php if($head || $mask || $neck || $body || $waist || $shoulder || $arm || $leg || $inner || $outer || $shoes || $front || $option || $hair): ?>
  <section class="l-section equipInfo equipClr">
    <h2>カラーバリエーション</h2>
    <ul>
      <? if($color){ foreach((array)$color as $value){
        echo '<li class="' . $value . '">';
        if($value == 'black'){ echo '黒'; }
        elseif($value == 'blue'){ echo '青'; }
        elseif($value == 'green'){ echo '緑'; }
        elseif($value == 'red'){ echo '赤'; }
        elseif($value == 'redpurple'){ echo '赤紫'; }
        elseif($value == 'purple'){ echo '紫'; }
        elseif($value == 'yellow'){ echo '黄'; }
        elseif($value == 'white'){ echo '白'; }
        elseif($value == 'pink'){ echo 'ピンク'; }
        elseif($value == 'turquoise'){ echo '青緑'; }
        echo '</li>'; } } else{ echo '<li class="no_clr">-</li>'; } ?>
    </ul>
  </section><!-- .l-section equipClr -->
<?php endif; ?>

<?php if($fuda_bushi || $fuda_yari || $fuda_yumi || $fuda_miko || $fuda_ninja || $fuda_yokenshi): ?>
  <section class="l-section equipInfo equipSpell">
    <h2>陰陽秘術</h2>
    <dl>
      <dt>秘術名</dt>
      <dd><?php if($spell_name){ echo $spell_name; } else{ echo '入力する'; } ?></dd>
    </dl>
    <dl>
      <dt>効果</dt>
      <dd><?php if($spell_effect){ echo $spell_effect; } else{ echo '入力する'; } ?></dd>
    </dl>
  </section><!-- .l-section equipInfo equipSpell -->
<?php endif; ?>

  <section class="l-section equipInfo equipOther">
    <h2>その他情報</h2>
    <p><?php if($other_meta){ echo $other_meta; } ?></p>
  </section><!-- .l-section equipInfo equipOther -->
</article><!-- /.l-article -->

<?php
  endwhile;
else :
      get_template_part('content', 'none');  //コンテントノーン呼び出し
endif;
?>

<aside class="writeBtn arrow"><a href="">
  <svg><title>このページを編集する</title><use xlink:href="#write"/></svg>このページを編集する
</a></aside><!-- .write -->

<aside class="comment">
  <h2>コメント</h2>
<?php comments_template(); ?>
</aside><!-- .comment -->

</main><!-- #main.l-main -->

<?php get_sidebar(); ?>

</div><!-- .l-wrap clearfix -->

<?php get_footer(); ?>