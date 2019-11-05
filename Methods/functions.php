<?php
//fetch items with only id and name
function fetchItem($connection, $table) {
	$query = "SELECT * FROM {$table} ";
	$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
	$contents = array();

	while ($content = mysqli_fetch_object($result)) {
		$contents[] = $content;
	}
	return $contents;
}


//fetch items decending
function fetchItemDecending($connection, $items, $table, $order){
	$query = "SELECT {$items} FROM {$table} ORDER BY {$table}.{$order} DESC ";
	$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
	$contents = array();

	while ($content = mysqli_fetch_object($result)) {
		$contents[] = $content;
	}
	return $contents;
}


//fetch items with join
function fetchItemWithJoin($connection, $items, $table, $join) {
	$query = "SELECT {$items} FROM {$table} {$join} ORDER BY {$table}.id DESC";
	$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
	$contents = array();

	while ($content = mysqli_fetch_object($result)) {
		$contents[] = $content;
	}
	return $contents;
}


//fetch an item with a join and a where clause for single comparism
function fetchSingleItemWithWhere($connection, $items, $table, $join, $to_compare, $where) {
	$query = "SELECT {$items} FROM {$table} {$join} WHERE {$to_compare} = {$where}";
	$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
	return mysqli_fetch_object($result);
}


//fetch an item with a where clause for single comparism
function fetchSingleItemWithWhereNoJoin($connection, $items, $table, $to_compare, $where) {
	$query = "SELECT {$items} FROM {$table} WHERE {$to_compare} = {$where}";
	$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
	return mysqli_fetch_object($result);
}


//fetch items with where clause without join
function fetchItemsWithoutJoin($connection, $items, $table, $to_compare, $where) {
	$query = "SELECT {$items} FROM {$table} WHERE {$to_compare} = {$where}";
	$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
	$contents = array();

	while ($content = mysqli_fetch_object($result)) {
		$contents[] = $content;
	}
	return $contents;
}


function fetchJoinWhere($connection, $items, $table, $join, $to_compare, $where) {
	$query = "SELECT {$items} FROM {$table} {$join} WHERE {$to_compare} = {$where}";
	$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
	$contents = array();

	while ($content = mysqli_fetch_object($result)) {
		$contents[] = $content;
	}
	return $contents;
}


//fetch items with where clause with join
function fetchItemsWithJoin($connection, $items, $table, $join, $to_compare, $where, $order) {
	$query = "SELECT {$items} FROM {$table} {$join} WHERE {$to_compare} = {$where} ORDER BY {$table}.{$order}";
	$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
	$contents = array();

	while ($content = mysqli_fetch_object($result)) {
		$contents[] = $content;
	}
	return $contents;
}


//fetch complaints with replies
function fetchComplaintsWithReply($connection, $message_id) {
	$id_query = "SELECT message_id FROM reply WHERE message_id = '$message_id' GROUP BY message_id";
	$id_query_result = mysqli_query($connection, $id_query) or die(mysqli_error($connection));

	$ids = array();

	while ($present_id = mysqli_fetch_object($id_query_result)) {
		$ids[] = $present_id->message_id;
	}

	if (count($ids == 0)) {
		return array();
	}

	$query = "SELECT reply.message_id, complaint.title, complaint.complaint_content, reply.content, reply.created_at FROM reply JOIN complaint ON complaint.id = reply.message_id WHERE reply.message_id IN (".implode(',', $ids).")";
	$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
	$contents = array();

	while ($record = mysqli_fetch_object($result)) {
		if (!array_key_exists($record->message_id, $contents)) {
			$contents[$record->message_id] = array(
				'message_id' => $record->message_id,
				'complaint_title' => $record->title,
				'complaint_content' => $record->complaint_content,
				'replies' => array()
			);
			$contents[$record->message_id]['replies'][] = array(
				'reply_content' => $record->content,
				'created_at' => $record->created_at
			);

		} else {
			$contents[$record->message_id]['replies'][] = array(
				'reply_content' => $record->content,
				'created_at' => $record->created_at
			);
		}
	}
	return array_values($contents);
}


//readable date and time format
function readableDate($raw_date) {
	//$new_date = date('m/d/Y h:i a', strtotime($raw_date));
	$new_date = strftime("%a %b %d, %Y at %H:%M", strtotime($raw_date));
	return $new_date;
}

//only date format
function myDate($raw_date){
	$new_date = strftime("%a %b %d, %Y", strtotime($raw_date));
	return $new_date;
}

//SELECT complaint.title, complaint_content, reply.content, reply.created_at FROM complaint JOIN reply ON reply.message_id = complaint.id WHERE complaint.id = 2


//login
function login($connection, $table, $username, $password) {
	$query = "SELECT * FROM {$table} WHERE username = '$username' AND password = '$password' LIMIT 1";
	$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
	return mysqli_fetch_object($result);
}


function duplicateUsername($connection, $table, $username) {
	$query = "SELECT * FROM {$table} WHERE username = '$username' LIMIT 1";
	$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
	return mysqli_fetch_object($result);
}


//notification counter
function notificationCounter($connection, $table, $to_compare, $id) {
	$query = "SELECT COUNT(id) AS total FROM {$table} WHERE status = 2 AND {$to_compare} = $id LIMIT 1";
	$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
	return mysqli_fetch_object($result);
}


function notCounter($connection, $table) {
	$query = "SELECT COUNT(id) AS total FROM {$table} WHERE status = 2 LIMIT 1";
	$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
	return mysqli_fetch_object($result);
}

?>