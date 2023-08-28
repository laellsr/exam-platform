import 'package:exam_platform/features/shared/buttons/secondary_button.dart';
import 'package:exam_platform/icons/icons.dart';
import 'package:flutter/material.dart';

class LoginPage extends StatelessWidget {
  const LoginPage({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: SafeArea(
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.center,
          children: [
            Row(
              children: [
                if (Navigator.canPop(context))
                  GestureDetector(
                    onTap: () {
                      Navigator.pop(context);
                    },
                    child: const Padding(
                      padding: EdgeInsets.only(left: 30),
                      child: Icon(Icons.arrow_back_ios),
                    ),
                  )
              ],
            ),
            const Row(
              mainAxisAlignment: MainAxisAlignment.center,
              children: [
                HatIcon(
                  height: 120,
                ),
              ],
            ),
            const Text(
              'Bem vindo \n de volta!',
              style: TextStyle(
                fontSize: 36,
                fontFamily: 'inter',
                color: Color(0xff334861),
              ),
            ),
            SizedBox(
              height: 82,
            ),
            Container(
              margin: const EdgeInsets.symmetric(horizontal: 45),
              decoration: BoxDecoration(
                color: const Color(0xffE3EDF7),
                borderRadius: BorderRadius.circular(16),
                boxShadow: [
                  BoxShadow(
                    offset: const Offset(0, 1),
                    color: Colors.grey.withOpacity(0.3),
                    blurRadius: 7,
                  ),
                  BoxShadow(
                    offset: const Offset(1, 0),
                    color: Colors.grey.withOpacity(0.3),
                    blurRadius: 7,
                  )
                ],
              ),
              alignment: Alignment.center,
              child: const Row(
                mainAxisAlignment: MainAxisAlignment.center,
                children: [
                  Padding(
                    padding: EdgeInsets.symmetric(vertical: 22.0),
                    child: CircleAvatar(
                      child: Text('NP'),
                    ),
                  ),
                  SizedBox(
                    width: 23,
                  ),
                  Text('Nome  Professor'),
                ],
              ),
            ),
            const Spacer(),
            Padding(
              padding:
                  const EdgeInsets.symmetric(horizontal: 50.0, vertical: 30),
              child: SecondaryButton(
                  child: const Row(
                    mainAxisSize: MainAxisSize.min,
                    children: [Text('Entrar'), Icon(Icons.arrow_forward_ios)],
                  ),
                  onTap: () {}),
            ),
          ],
        ),
      ),
    );
  }
}
