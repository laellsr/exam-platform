import 'package:exam_platform/features/login/pages/login_page.dart';
import 'package:exam_platform/features/login/pages/selection_page.dart';
import 'package:exam_platform/features/login/pages/signin_page.dart';
import 'package:flutter/material.dart';

void main() {
  runApp(const MyApp());
}

class MyApp extends StatelessWidget {
  const MyApp({super.key});

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      initialRoute: '/',
      routes: {
        '/': (context) => const SelectionPage(),
        '/login': (context) => const LoginPage(),
        '/signin': (context) => const SigninPage(),
      },
      theme: ThemeData(
        scaffoldBackgroundColor: const Color(0xffEBF3FA),
        fontFamily: 'inter',
      ),
    );
  }
}
