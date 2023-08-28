import 'package:exam_platform/features/shared/buttons/primary_button.dart';
import 'package:exam_platform/icons/icons.dart';
import 'package:flutter/material.dart';

class SelectionPage extends StatelessWidget {
  const SelectionPage({super.key});

  @override
  Widget build(BuildContext context) {
    return Container(
      decoration: const BoxDecoration(
        image: DecorationImage(
          image: AssetImage('assets/images/background_select.png'),
        ),
      ),
      child: Scaffold(
        backgroundColor: Colors.transparent,
        body: SafeArea(
          child: Column(
            crossAxisAlignment: CrossAxisAlignment.center,
            children: [
              const HatIcon(),
              const Spacer(),
              Row(
                mainAxisAlignment: MainAxisAlignment.center,
                children: [
                  PrimaryButton(
                    onTap: () {
                      Navigator.pushNamed(context, '/signin');
                    },
                    child: Container(
                        alignment: Alignment.center,
                        width: 80,
                        child: const Text('Cadastrar')),
                  ),
                  const SizedBox(
                    width: 33,
                  ),
                  PrimaryButton(
                    onTap: () {
                      Navigator.pushNamed(context, '/login');
                    },
                    child: Container(
                        alignment: Alignment.center,
                        width: 80,
                        child: const Text('Logar')),
                  )
                ],
              ),
              const SizedBox(
                height: 83,
              )
            ],
          ),
        ),
      ),
    );
  }
}
