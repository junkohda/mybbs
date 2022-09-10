function confirmRegister() {
    return confirm("データの登録を行います。\nよろしいですか？");
}

function confirmUpdate() {
    return confirm("データの更新を行います。\nよろしいですか？");
}

function confirmDelete() {
    return confirm("データの削除を行います。\nよろしいですか？");
}

function confirmChanged() {
    return confirm("データが更新されています。破棄しますか？");
}

function confirmImport() {
    return confirm("データのインポートを行います。\nよろしいですか？");
}

function confirmWith(message) {
    return confirm(message);
}

function alertRegistered(callback) {
    notify("", "データを登録しました。", callback);
}

function alertUpdated(callback) {
    notify("", "データを更新しました。", callback);
}

function alertDeleted(callback) {
    notify("", "データを削除しました。", callback);
}

function alertDownloaded(callback) {
    notify("", "ダウンロードしました。", callback);
}

function alertImported(callback) {
    notify("", "インポートしました。", callback);
}

function alertExported(callback) {
    notify("", "エクスポートしました。", callback);
}

function alertSelled(callback) {
    notify("", "売上処理が完了しました。", callback);
}

function alertFileRequired() {
    alert("エラー", "ファイルを選択して下さい。");
}

function alertError(msg, callback = null) {
    alert("エラー", msg, callback);
}

function alertWith(msg, callback = null) {
    notify("通知", msg, callback);
}

function alertMsg(msg, callback = null) {
    notify("", msg, callback);
}

function validationError(msg) {
    //alert(msg);
    alert(msg);
}