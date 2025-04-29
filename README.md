Project Report: AI-Powered Marketing Campaign Generator

Project Title

AI-Powered Marketing Campaign Generator with Template Customization and Export Features
Problem Statement

In the digital marketing industry, businesses often struggle to create engaging, goal-specific campaigns
quickly. This tool solves that by providing AI-generated marketing content based on minimal inputs.

Objective

To build a web-based application that generates complete marketing campaigns including slogans, ad copy,
and campaign descriptions using AI. The tool should allow users to:
- Generate campaign content using AI
- Choose from styled templates
- Export campaigns as PDF or text
- Save and manage campaigns via a dashboard
- Use a modern dark theme UI
Technologies Used
Frontend: HTML, CSS, JavaScript, AOS (Animate on Scroll)
Backend: PHP (PDO), MySQL
Database: phpMyAdmin (MySQL)
AI Integration: OpenRouter API (Text Generation)
Export: jsPDF
Server: XAMPP (Apache + MySQL)
System Architecture & Modules
1. Login / Signup System
2. Dashboard with sidebar navigation
3. Campaign Generator (Text only)
Project Report: AI-Powered Marketing Campaign Generator
4. Template Customization
5. Export Options (PDF, Text)
6. My Campaigns History
7. Settings Page (User Info, Preferences)
Database Schema
Table: users
- id, name, email, password, created_at
Table: campaigns
- id, user_id, industry, company, objective, output, created_at
Key Features
- AI Text Generation using OpenRouter API
- Multiple unique outputs per campaign
- Campaign export as PDF/Text
- Save and manage past campaigns
- User login and dashboard interface
- Dark theme with pastel highlights
- AOS scroll animations for modern UI
- Shareable campaign links
Flowchart
User Login/Signup
Dashboard Access
Input Campaign Details
Project Report: AI-Powered Marketing Campaign Generator
AI Text Generation
Preview Template
Edit + Export
Save to DB + Share Link
Testing & Validation
- Form inputs validated with JS & PHP
- AI API tested with sample prompts
- Export and saving functionality verified
- UI tested across devices and browsers
Challenges Faced
- Maintaining prompt consistency for AI text
- Designing responsive UI with animation
- Implementing real-time export to PDF
- Managing user-specific campaign history
Future Enhancements
- Add AI image generation
- Export campaigns as GIF/MP4
- Collaborative editing features
- Add campaign analytics and performance
Conclusion
This project demonstrates a scalable and efficient solution for automated text-based marketing content
creation. With a user-friendly dashboard, export tools, and AI capabilities, it serves as a powerful tool for
Project Report: AI-Powered Marketing Campaign Generator
startups, freelancers, and marketing teams.
