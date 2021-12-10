const Joi = require('joi');

const joiValidation = (request, response, schema) => {
    const {body} = request
    const validationSchema = Joi.object().keys(schema)
    const result = validationSchema.validate(body, {abortEarly: false})
    if (result.error) {
        const errors = result.error.details
        // printError(response, result.error.details)
        response.status(500);
        response.json({
            status: false,
            message: errors[0].message,
            errors
        });
    }
}

module.exports = {joiValidation}
