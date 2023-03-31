<?php
// 1. Create API (Controller.php)
// Cách 1
$votes = new Vote([
    'userid' => $request->input('userid'),
    'vote' => $request->input('vote'),
]);
$votes->save();
return response()->json('Vote created!');

// Cách 2
try {
    $vote = Vote::create($request->all());
    return response()->json([
        'status' => true,
        'message' => 'Success',
        'data' => $vote
    ], 201);
} catch (Exception $e) {
    return response()->json([
        'status' => false,
        'message' => $e
    ], 500);
}

// 2. Read Single Product API
$votes = Vote::all();
foreach($votes as $key => $vote) {
    if ($vote->userid == $userid){
        return response()->json($votes[$key]); 
    } 
}

// 3. Read All API
$votes = Vote::find($id);
return response()->json($votes);

// 4. Update API theo ID
$votes = Vote::find($id);
$votes->update($request->all());
return response()->json('Vote updated');

// 5. Update API theo field
try {
    $getVote = Vote::where('userid', '=',$id)->first();

    if ($getVote === null) {
        return response()->json([
            'status' => false,
            'message' => 'Vote not found'
        ], 400);
    }
    $getVote->update($request->all());
    return response()->json([
        'status' => true,
        'message' => 'Success',
        'data' => $getVote
    ], 201);
} catch (Exception $e) {
    return response()->json([
        'status' => false,
        'message' => $e
    ], 500);
}

// 6. Delete API
// C1:
$votes = Vote::find($id);
$votes->delete();
return response()->json(' deleted!');

// C2:
try {
    $getVote = Vote::find($id);
    if ($getVote === null) {
        return response()->json([
            'status' => false,
            'message' => 'Vote not found'
        ], 400);
    }
    $getVote->delete();
    return response()->json([
        'status' => true,
        'message' => 'Success',
        'data' => $getVote
    ], 200);
} catch (Exception $e) {
    return response()->json([
        'status' => false,
        'message' => $e
    ], 500);
}
