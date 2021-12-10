var express = require('express');
var router = express.Router();
const Joi = require('joi');
const asyncHandler = require('express-async-handler')
const authentication = require('middleware/auth')
const {joiValidation} = require("helpers/errorHandle")
const Post = require("models").Post
const User = require("models").User

router.post('/posts', authentication, asyncHandler(async (request, response) => {
    joiValidation(request, response, {
        title: Joi.string().required(),
        description: Joi.string().required(),
    })
    const {user, body} = request
    const create = await Post.create({user_id: user.id, ...body})
    const post = await Post.findOne({
        include: {model: User, as: 'user', attributes: {exclude: ['password', 'token']}},
        where: {id: create.id}
    })
    response.send(post)
}))

module.exports = router;
