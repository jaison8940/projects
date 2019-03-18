var express = require('express');
var router = express.Router();
var mongojs = require('mongojs');
var db = mongojs('loginapp', ['userdet']);
var bcrypt = require('bcryptjs');
var passport = require('passport');
var LocalStrategy = require('passport-local').Strategy;

// Login Page - GET
router.get('/login', function(req, res){
	res.render('login');
});

// Register Page - GET
router.get('/register', function(req, res){
	res.render('register');
});

router.post('/register', function(req, res){
	// res.render('register');
	// console.log('User is adding');
	var name     		= req.body.name;
	var email    		= req.body.email;
	var username 		= req.body.username;
	var password 		= req.body.password;
	var password2 		= req.body.password2;

	// Validation
	req.checkBody('name', 'Name field is required').notEmpty();
	req.checkBody('email', 'Email field is required').notEmpty();
	req.checkBody('email', 'Please use a valid email address').isEmail();
	req.checkBody('username', 'Username field is required').notEmpty();
	req.checkBody('password', 'Password field is required').notEmpty();
	req.checkBody('password2', 'Passwords do not match').equals(req.body.password);

	// Check for errors
	var errors = req.validationErrors();

	if(errors){
		console.log('Form has errors...');
		res.render('register', {
			errors: errors,
			name: name,
			email: email,
			username:username,
			password: password,
			password2: password2
		});
	} else {
		// console.log('success');
		var newusr = {
			name: name,
			email: email,
			username:username,
			password: password,
		}
        
        

			
		bcrypt.genSalt(10, function(err, salt){
			bcrypt.hash(newusr.password, salt, function(err, hash){
				newusr.password = hash;

				db.users.insert(newusr, function(err, doc){
					if(err){
						res.send(err);
					} else {
						console.log('User Added...');

						//Success Message
						req.flash('success', 'You are registered and can now log in');

						// Redirect after register
						res.location('/');
						res.redirect('/');
					}
				});
			});
		});
	}

});


passport.serializeUser(function(user, done) {
  done(null, user._id);
});

passport.deserializeUser(function(id, done) {
 db.users.findOne({_id: mongojs.ObjectId(id)}, function(err, user){
 	done(err, user);
 });
});

passport.use(new LocalStrategy(
	function(username, password, done){
		db.users.findOne({username: username}, function(err, user){
			if(err) {
				return done(err);
			}
			if(!user){
				return done(null, false, {message: 'Incorrect username'});
			}

			bcrypt.compare(password, user.password, function(err, isMatch){
				if(err) {
					return done(err);
				}
				if(isMatch){
					return done(null, user);
				} else {
					return done(null, false, {message: 'Incorrect password'});
				}
			});
		});
	}
	));

// Login - POST
router.post('/login',
  passport.authenticate('local', { successRedirect: '/',
                                   failureRedirect: '/user/login',
                                   failureFlash: 'Invalid Username Or Password' }), 
  function(req, res){
  	console.log('Auth Successfull');
  	res.redirect('/');
  });

router.get('/logout',function(req,res){
	req.logout();
	req.flash('success','Hey you have logged out');
    res.redirect('/user/login');
});


module.exports = router;