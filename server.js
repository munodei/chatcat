'use strict';
const express = require('express');
const app     = express();
const chatCat = require('./app');
// Connection String from MongoDB Atlas
const connectionString =
  "mongodb+srv://chatcatapp:N75cfRYwsecBKWpK@cluster0-scskh.mongodb.net/test?retryWrites=true&w=majority";

const mongoose = require("mongoose");
app.set('port', process.env.PORT || 3000);
app.use(express.static('public'));
app.set('view engine','ejs');
//console.log(chatCat);
app.use('/', chatCat.router);
mongoose.connect(connectionString, {
  useNewUrlParser: true
});

mongoose.connection.on("error", error => console.log(`MongoDB Error: ${error}`));

const userSchema = new mongoose.Schema({
  name: String,
  age: Number,
  email: String
});

const userModel = mongoose.model("myUser", userSchema);

// Create a new record
const Ron = new userModel({
  name: "Ron Michaels",
  age: 22,
  email: "ron.m@gmail.com"
});

Ron.save(err => console.log(err));

// Fetch a record
userModel.findOne({email: "ron.m@gmail.com"}, (err, result) => {
  if (err) return console.log(err);
  console.log(result);
});


app.listen(app.get('port'),()=>{
  console.log('running on 3000');
});
