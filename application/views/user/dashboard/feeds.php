<?php // after post.php // ?>

<div id="iotest"></div>

<div class="row">
  <h3>Status feeds</h3>
  <table class="table">
    <tr>
      <th>Post Content</th>
      <th>Comments</th>
      <th>Time</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
    <?php foreach($news_feeds as $feeds => $value): ?>
    <tbody id="table-content">
    <tr>
      <td><a href="#" data-featherlight-persist="true" data-featherlight="#fl-<?php echo $value['post_id']; ?>"><?= $value['post']?></a></td>
      <td>
        <a href="#">
          <span class="badge"><?= $value['count_comment']; ?></span>
        </a>
      </td>
      <td><?= timespan($value['time'], time(), 2)?></td>
      <td>
      <?php
        echo anchor('post/update/'.$value['post_id'], 'Edit', 'class="btn btn-default"');
      ?>
      </td>
      <td>
      <?php
        echo anchor('post/delete/'.$value['post_id'], 'Delete', 'class="btn btn-default"');
      ?>
      </td>
    </tr>
    <div style="display:none;">
    <!-- Lightbox <?php echo $value['post_id']; ?> -->
      <div id="fl-<?php echo $value['post_id']; ?>">
        <div class="general-comment-box">
          <div class="col-md-6">
          <p><?php echo $value['post']; ?></p>
          </div>
          <div class="col-md-6">
          <form>
          <h4>Comments</h4>
            <hr />
            <div id="comment_wrap">
              <dl class="dl-horizontal" id="commentlog_<?php echo $value['post_id'] ; ?>">
              </dl>
            </div>
            <hr />
            <div class="input-group ">
              <span class="input-group-addon" id="commentpane"><?php echo ucfirst($this->session->username); ?></span>
              <input type="text" id="commentbox_<?php echo $value['post_id']?>" data-cid="<?php echo $value['post_id']?>" class="form-control cids" name="commentbox" placeholder="Write comment" aria-describedby="commentpane" />
              <span class="input-group-btn">
                <button class="btn btn-default send_comment" id="btncomment_<?php echo $value['post_id']?>" type="button">
                  <span class="glyphicon glyphicon-send" aria-hidden="true"></span>
                </button>
              </span>
            </div>
          </form>
         </div>
        </div>
      </div>
    <!-- lightbox end -->
    </div>
    <?php endforeach; ?>
    </tbody>
  </table>
</div>

