sconst express = require('express');
const mongoose = require('mongoose');
const cors = require('cors');
require('dotenv').config();

const app = express();

// Middleware
app.use(express.json());
app.use(cors());
app.use('/uploads', express.static('uploads')); // To view the images

// Database Connection (MongoDB)
const MONGO_URI = process.env.MONGO_URI || 'mongodb://localhost:27017/mediquick';
mongoose.connect(MONGO_URI, {
    useNewUrlParser: true,
    useUnifiedTopology: true
}).then(() => {
    console.log("MongoDB Connected Successfully!");
}).catch((err) => {
    console.log("DB Connection Error: ", err);
});

// Basic Test Route
app.get('/', (req, res) => {
    res.send("MediQuick Back-end API is running...");
});

// Port configuration
const PORT = process.env.PORT || 5000;
app.listen(PORT, () => {
    console.log(`Server is running on port ${PORT}`);
});