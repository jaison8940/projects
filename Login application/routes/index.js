var express = require('express');
var router = express.Router();

router.get('/',ensAuthced,function(req, res){
	res.render('index');
});

function ensAuthced(req, res, next){
	if(req.isAuthenticated()){
		return next();
	}
	res.redirect('/user/login');
}

module.exports = router;