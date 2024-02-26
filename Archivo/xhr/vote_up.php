<?php 
if ($f == 'vote_up') {
    if (!empty($_GET['id']) && lui_CheckMainSession($hash_id) === true) {
        $post_id = lui_GetPostIDFromOptionID($_GET['id']);
        if (lui_IsPostVoted($post_id, $wo['user']['user_id'])) {
            $data = array(
                'status' => 400,
                'text' => $wo['lang']['you_have_already_voted']
            );
            header("Content-type: application/json");
            echo json_encode($data);
            exit();
        } else {
            $vote = lui_VoteUp($_GET['id'], $wo['user']['user_id']);
            if ($vote) {
                $data = array(
                    'status' => 200,
                    'votes' => Ju_GetPercentageOfOptionPost($post_id)
                );
            }
        }
    }
    header("Content-type: application/json");
    echo json_encode($data);
    exit();
}
